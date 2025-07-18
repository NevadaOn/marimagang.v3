@php
    $steps = [
        'Registrasi dan Login',
        'Profil Mahasiswa',
        'Pengajuan Magang',
        'ACC Admin 1',
        'ACC Bidang',
        'ACC Admin 2',
        'Kegiatan Magang',
        'Magang Selesai',
    ];

    $completionStep = match ($completionLevel) {
        'incomplete' => 1,
        'profile-complete' => 2,
        'skills-complete' => 3,
        default => 1,
    };

    $statusToStep = [
        'pending' => 4,
        'diproses' => 4,
        'diteruskan' => 5,
        'diterima' => 6,
        'magang' => 7,
        'selesai' => 8,
    ];

    $statusStep = $statusAktif && isset($statusToStep[$statusAktif]) ? $statusToStep[$statusAktif] : null;

    $currentStep = max($completionStep, $statusStep ?? 0);

    function getStepColor($index, $currentStep) {
        $stepNumber = $index + 1;
        if ($stepNumber < $currentStep) return '#16a34a';
        if ($stepNumber === $currentStep) return '#3b82f6';
        return '#d1d5db';
    }
@endphp

<style>
    .progress-container {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 6px rgba(0,0,0,0.1);
    }

    .progress-step {
        flex: 0 0 auto;
        width: 130px;
        text-align: center;
    }

    .step-number {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        margin: 0 auto 8px auto;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
        font-size: 16px;
    }

    .step-label {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        line-height: 1.3;
    }
</style>

<div class="progress-container">
    @foreach ($steps as $index => $label)
        <div class="progress-step">
            <div class="step-number" style="background-color: {{ getStepColor($index, $currentStep) }}">
                {{ $index + 1 }}
            </div>
            <div class="step-label">{{ $label }}</div>
        </div>
    @endforeach
</div>
