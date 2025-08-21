<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Progress Bar</title>
    <style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */

        /* body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            padding: 20px;
        } */

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0 auto;
        }

        .card-header {
            padding: 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-header h4 {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
            margin: 0;
        }

        .card-body {
            padding: 24px;
        }

        /* Modern Progress Bar Styles */
        .modern-progress-container {
            position: relative;
            margin: 24px 0;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .progress-title {
            font-size: 16px;
            font-weight: 500;
            color: #374151;
        }

        .progress-percentage {
            font-size: 18px;
            font-weight: 600;
            color: #3b82f6;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .progress-track {
            position: relative;
            height: 12px;
            background: #f1f5f9;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8, #6366f1);
            border-radius: 20px;
            transition: width 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .progress-stages {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding: 0 8px;
        }

        .stage {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            flex: 1;
        }

        .stage-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 3px solid #e5e7eb;
            background: white;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .stage-dot.active {
            border-color: #3b82f6;
            background: #3b82f6;
            transform: scale(1.2);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
        }

        .stage-dot.completed {
            border-color: #10b981;
            background: #10b981;
        }

        .stage-dot.completed::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 10px;
            font-weight: bold;
        }

        .stage-label {
            font-size: 12px;
            color: #6b7280;
            text-align: center;
            margin-top: 8px;
            font-weight: 500;
            max-width: 80px;
            line-height: 1.3;
        }

        .stage-label.active {
            color: #3b82f6;
            font-weight: 600;
        }

        .stage-label.completed {
            color: #10b981;
        }

        .stage-percentage {
            font-size: 10px;
            color: #9ca3af;
            margin-top: 2px;
        }

        /* Connecting line between stages */
        .stage:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 8px;
            left: calc(50% + 8px);
            width: calc(100% - 16px);
            height: 2px;
            background: #e5e7eb;
            z-index: 1;
        }

        .stage.completed:not(:last-child)::after {
            background: #10b981;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .progress-stages {
                flex-wrap: wrap;
                gap: 16px;
            }
            
            .stage {
                min-width: 80px;
            }
            
            .stage:not(:last-child)::after {
                display: none;
            }
        }

        /* Demo controls */
        .demo-controls {
            margin-top: 32px;
            padding: 20px;
            background: #f9fafb;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .demo-controls h5 {
            margin-bottom: 16px;
            color: #374151;
            font-size: 16px;
        }

        .demo-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .demo-btn {
            padding: 8px 16px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .demo-btn:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h4>Progress Bar Magang - 7 Tahap</h4>
        </div>
        <div class="card-body">
            <div class="modern-progress-container">
                <div class="progress-header">
                    <span class="progress-title">Kelengkapan Profile dan Status Pengajuan</span>
                    <span class="progress-percentage" id="overall-percentage">10%</span>
                </div>
                
                <div class="progress-track">
                    <div class="progress-fill" id="overall-progress" style="width: 10%"></div>
                </div>

                <div class="progress-stages" id="progress-stages">
                    <div class="stage completed" data-stage="1">
                        <div class="stage-dot completed"></div>
                        <div class="stage-label completed">
                            Profil & Skill
                            <div class="stage-percentage">10%</div>
                        </div>
                    </div>
                    <div class="stage active" data-stage="2">
                        <div class="stage-dot active"></div>
                        <div class="stage-label active">
                            Pengajuan
                            <div class="stage-percentage">25%</div>
                        </div>
                    </div>
                    <div class="stage" data-stage="3">
                        <div class="stage-dot"></div>
                        <div class="stage-label">
                            Diteruskan
                            <div class="stage-percentage">40%</div>
                        </div>
                    </div>
                    <div class="stage" data-stage="4">
                        <div class="stage-dot"></div>
                        <div class="stage-label">
                            Diterima
                            <div class="stage-percentage">55%</div>
                        </div>
                    </div>
                    <div class="stage" data-stage="5">
                        <div class="stage-dot"></div>
                        <div class="stage-label">
                            Magang
                            <div class="stage-percentage">70%</div>
                        </div>
                    </div>
                    <div class="stage" data-stage="6">
                        <div class="stage-dot"></div>
                        <div class="stage-label">
                            Laporan
                            <div class="stage-percentage">85%</div>
                        </div>
                    </div>
                    <div class="stage" data-stage="7">
                        <div class="stage-dot"></div>
                        <div class="stage-label">
                            Selesai
                            <div class="stage-percentage">100%</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Demo Controls -->
            {{-- <div class="demo-controls">
                <h5>Demo - Klik untuk melihat tahap:</h5>
                <div class="demo-buttons">
                    <button class="demo-btn" onclick="setProgress(5, 'Profil Saja')">Profil (5%)</button>
                    <button class="demo-btn" onclick="setProgress(10, 'Profil + Skill')">Profil + Skill (10%)</button>
                    <button class="demo-btn" onclick="setProgress(25, 'Pengajuan Diproses')">Pengajuan (25%)</button>
                    <button class="demo-btn" onclick="setProgress(40, 'Diteruskan')">Diteruskan (40%)</button>
                    <button class="demo-btn" onclick="setProgress(55, 'Diterima')">Diterima (55%)</button>
                    <button class="demo-btn" onclick="setProgress(70, 'Sedang Magang')">Magang (70%)</button>
                    <button class="demo-btn" onclick="setProgress(85, 'Laporan Submitted')">Laporan (85%)</button>
                    <button class="demo-btn" onclick="setProgress(100, 'Selesai')">Selesai (100%)</button>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- <script>
        function updateModernProgress(percentage, statusText = '') {
            const progressBar = document.getElementById('overall-progress');
            const percentageText = document.getElementById('overall-percentage');
            const stages = document.querySelectorAll('.stage');
            
            // Update progress bar
            progressBar.style.width = percentage + '%';
            percentageText.textContent = percentage + '%';
            
            // Define stage thresholds
            const stageThresholds = [
                { min: 0, max: 10, stage: 1, label: 'Profil & Skill' },
                { min: 11, max: 25, stage: 2, label: 'Pengajuan' },
                { min: 26, max: 40, stage: 3, label: 'Diteruskan' },
                { min: 41, max: 55, stage: 4, label: 'Diterima' },
                { min: 56, max: 70, stage: 5, label: 'Magang' },
                { min: 71, max: 85, stage: 6, label: 'Laporan' },
                { min: 86, max: 100, stage: 7, label: 'Selesai' }
            ];
            
            // Reset all stages
            stages.forEach((stage, index) => {
                const dot = stage.querySelector('.stage-dot');
                const label = stage.querySelector('.stage-label');
                
                dot.classList.remove('completed', 'active');
                label.classList.remove('completed', 'active');
                
                const stageNum = index + 1;
                const stagePercentage = [10, 25, 40, 55, 70, 85, 100][index];
                
                if (percentage >= stagePercentage) {
                    // Completed stage
                    dot.classList.add('completed');
                    label.classList.add('completed');
                } else {
                    // Find current active stage
                    const currentStage = stageThresholds.find(s => 
                        percentage >= s.min && percentage <= s.max
                    );
                    
                    if (currentStage && currentStage.stage === stageNum) {
                        dot.classList.add('active');
                        label.classList.add('active');
                    }
                }
            });
        }
        
        function setProgress(percentage, statusText) {
            updateModernProgress(percentage, statusText);
        }
        
        // Initialize with default progress
        document.addEventListener('DOMContentLoaded', function() {
            updateModernProgress(10, 'Profil + Skill Lengkap');
        });
    </script> --}}
    