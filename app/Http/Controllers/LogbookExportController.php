<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Converter;
use Illuminate\Support\Facades\Auth;

class LogbookExportController extends Controller
{
    public function exportDoc(Request $request)
    {
        $user = Auth::user();

        $logbooks = Logbook::where('user_id', $user->id)
            ->orderBy('tanggal', 'asc')
            ->get();

        $phpWord = new PhpWord();

        $sectionStyle = [
            'paperSize' => 'A4',
            'marginTop' => Converter::inchToTwip(0.1),
            'marginBottom' => Converter::inchToTwip(0.05),
            'marginLeft' => Converter::inchToTwip(1),
            'marginRight' => Converter::inchToTwip(1),
            'headerDistance' => Converter::inchToTwip(0.25),
            'footerDistance' => Converter::inchToTwip(0.05),
        ];

        $section = $phpWord->addSection($sectionStyle);

        $header = $section->addHeader();

        $headerTable = $header->addTable([
            'width' => 10000,
            'unit' => \PhpOffice\PhpWord\SimpleType\TblWidth::TWIP,
            'borderSize' => 0,
            'cellMargin' => 0,
        ]);
        $headerTable->addRow();

        $cellLeft = $headerTable->addCell(2000, ['valign' => 'center']);
        $logoPath = public_path('images/logo-univ.png');
        if (file_exists($logoPath)) {
            $cellLeft->addImage($logoPath, [
                'width' => 80,
                'height' => 80,
                'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT,
            ]);
        } else {
            $cellLeft->addText('(Logo Universitas)', ['italic' => true, 'size' => 8], ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT]);
        }

        $cellRight = $headerTable->addCell(8000);
        $cellRight->addText('HEADER UNIVERSITAS', ['bold' => true, 'size' => 12], ['spaceAfter' => 100]);
        $cellRight->addText('alamat universitas');

        $section->addTextBreak(1);

        $section->addText(
            'LOG BOOK PRAKTIK KERJA LAPANGAN',
            ['bold' => true, 'size' => 16],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 300]
        );

        $paragraphStyle = [
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
            'spaceAfter' => 150,
        ];

        $section->addText("1. Nama        : ................................................................", [], $paragraphStyle);
        $section->addText("2. NIM         : ................................................................", [], $paragraphStyle);
        $section->addText("3. Tempat PKL  : ................................................................", [], $paragraphStyle);
        $section->addText("4. Alamat PKL  : ................................................................", [], $paragraphStyle);
        $section->addText("5. Pendamping PKL : ............................................................", [], $paragraphStyle);

        $section->addTextBreak(1);

        $tableStyleName = 'Logbook Table';
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 80,
            'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER,
        ];
        $firstRowStyle = ['bgColor' => 'EEEEEE'];
        $phpWord->addTableStyle($tableStyleName, $tableStyle, $firstRowStyle);

        $table = $section->addTable($tableStyleName);

        $table->addRow();
        $table->addCell(800)->addText('No.', ['bold' => true]);
        $table->addCell(3000)->addText('Hari, Tanggal', ['bold' => true]);
        $table->addCell(7000)->addText('Kegiatan', ['bold' => true]);

        foreach ($logbooks as $index => $log) {
            $table->addRow();
            $table->addCell(800)->addText($index + 1);
            $table->addCell(3000)->addText(Carbon::parse($log->tanggal)->locale('id')->isoFormat('dddd, DD MMMM YYYY'));
            $table->addCell(7700)->addText($log->kegiatan);
        }

        $footer = $section->addFooter();

        $websiteName = 'marimagang.malangkab.go.id';

        $footerLeftStyle = [
            'size' => 8,
            'italic' => true,
            'color' => '999999',
        ];

        $footerParagraphStyle = [
            'spaceBefore' => 0,
            'spaceAfter' => 0,
            'spacing' => 0,
        ];

        $printDate = date('d-m-Y');

        $footer->addPreserveText(
            "$websiteName | Dicetak: $printDate",
            $footerLeftStyle,
            array_merge(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT], $footerParagraphStyle)
        );

        $footer->addPreserveText(
            '{PAGE} / {NUMPAGES}',
            ['size' => 10],
            array_merge(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT], $footerParagraphStyle)
        );

        $fileName = 'logbook_' . date('Ymd_His') . '.docx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save("php://output");
        exit;
    }
}
