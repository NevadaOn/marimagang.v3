(function() {
    'use strict';
    
    const css = `
        .starry-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            z-index: -1;
            pointer-events: none;
        }
        
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: twinkle var(--duration) infinite;
        }
        
        .star.size-1 {
            width: 1px;
            height: 1px;
        }
        
        .star.size-2 {
            width: 2px;
            height: 2px;
            box-shadow: 0 0 2px rgba(255, 255, 255, 0.5);
        }
        
        .star.size-3 {
            width: 3px;
            height: 3px;
            box-shadow: 0 0 4px rgba(255, 255, 255, 0.7);
        }
        
        .meteor {
            position: absolute;
            width: var(--meteor-size);
            height: var(--meteor-size);
            background: radial-gradient(circle, #fff 0%, rgba(255,255,255,var(--core-opacity)) 50%, transparent 100%);
            border-radius: 50%;
            opacity: 0;
            animation: meteor-fall var(--duration) var(--easing);
        }
        
        .meteor.bright {
            filter: brightness(1.5);
            box-shadow: 0 0 8px rgba(255,255,255,0.8);
        }
        
        .meteor.dim {
            filter: brightness(0.6);
        }
        
        .meteor.glowing {
            filter: brightness(2) saturate(1.2);
            box-shadow: 0 0 12px rgba(255,255,255,1), 0 0 20px rgba(255,255,255,0.6);
        }
        
        .meteor::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: var(--tail-length);
            height: var(--tail-width);
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255,255,255,var(--tail-start-opacity)) 20%, 
                rgba(255,255,255,var(--tail-mid-opacity)) 50%, 
                rgba(255,255,255,var(--tail-end-opacity)) 100%);
            transform: translate(-50%, -50%) rotate(var(--tail-rotation));
            border-radius: 1px;
            box-shadow: 0 0 var(--tail-glow) rgba(255,255,255,var(--tail-glow-opacity));
        }
        
        .meteor::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: var(--inner-tail-length);
            height: var(--inner-tail-width);
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255,255,255,var(--inner-tail-opacity)) 30%, 
                rgba(255,255,255,1) 100%);
            transform: translate(-50%, -50%) rotate(var(--tail-rotation));
            border-radius: 1px;
        }
        
        @keyframes twinkle {
            0%, 100% { 
                opacity: 0.3;
                transform: scale(1);
            }
            50% { 
                opacity: 1;
                transform: scale(1.2);
            }
        }
        
        @keyframes meteor-fall {
            0% {
                opacity: 0;
                transform: translate(var(--start-x), var(--start-y)) scale(var(--start-scale));
            }
            var(--fade-in-point) {
                opacity: var(--max-opacity);
                transform: translate(
                    calc(var(--start-x) + (var(--end-x) - var(--start-x)) * var(--fade-in-progress)), 
                    calc(var(--start-y) + (var(--end-y) - var(--start-y)) * var(--fade-in-progress))
                ) scale(var(--peak-scale));
            }
            var(--fade-out-point) {
                opacity: var(--fade-out-opacity);
                transform: translate(
                    calc(var(--start-x) + (var(--end-x) - var(--start-x)) * var(--fade-out-progress)), 
                    calc(var(--start-y) + (var(--end-y) - var(--start-y)) * var(--fade-out-progress))
                ) scale(var(--mid-scale));
            }
            100% {
                opacity: 0;
                transform: translate(var(--end-x), var(--end-y)) scale(var(--end-scale));
            }
        }
    `;
    
    const styleElement = document.createElement('style');
    styleElement.textContent = css;
    document.head.appendChild(styleElement);
    
    class StarrySky {
        constructor() {
            this.container = null;
            this.stars = [];
            this.meteors = [];
            this.init();
        }
        
        init() {
            this.container = document.createElement('div');
            this.container.className = 'starry-container';
            document.body.appendChild(this.container);

            this.generateStars(150);

            this.startMeteorShower();
            
            window.addEventListener('resize', () => this.handleResize());
        }
        
        generateStars(count) {
            for (let i = 0; i < count; i++) {
                this.createStar();
            }
        }
        
        createStar() {
            const star = document.createElement('div');
            star.className = 'star';
            
            const size = Math.floor(Math.random() * 3) + 1;
            star.classList.add(`size-${size}`);

            const x = Math.random() * window.innerWidth;
            const y = Math.random() * window.innerHeight;
            star.style.left = x + 'px';
            star.style.top = y + 'px';
            
            const duration = (Math.random() * 4 + 2).toFixed(1);
            star.style.setProperty('--duration', duration + 's');
            
            star.style.animationDelay = (Math.random() * 5).toFixed(1) + 's';
            
            this.container.appendChild(star);
            this.stars.push(star);
        }
        
        createMeteor() {
            const meteor = document.createElement('div');
            meteor.className = 'meteor';

            const meteorType = this.getMeteorType();
            const meteorConfig = this.getMeteorConfig(meteorType);

            meteor.classList.add(meteorType);

            const startX = window.innerWidth * 0.7 + Math.random() * (window.innerWidth * 0.3);
            const startY = Math.random() * (window.innerHeight * 0.3);

            const trajectoryVariation = meteorConfig.trajectoryVariation;
            const endX = startX - (window.innerWidth * (0.3 + Math.random() * 0.5)) * trajectoryVariation;
            const endY = startY + (window.innerHeight * (0.3 + Math.random() * 0.5)) * trajectoryVariation;
            
            const deltaX = endX - startX;
            const deltaY = endY - startY;
            const angle = Math.atan2(deltaY, deltaX) * (180 / Math.PI);

            meteor.style.left = startX + 'px';
            meteor.style.top = startY + 'px';

            this.configureMeteorAnimation(meteor, meteorConfig, startX, startY, endX, endY, angle);
            
            this.container.appendChild(meteor);
            this.meteors.push(meteor);
            
            setTimeout(() => {
                if (meteor.parentNode) {
                    meteor.parentNode.removeChild(meteor);
                }
                const index = this.meteors.indexOf(meteor);
                if (index > -1) {
                    this.meteors.splice(index, 1);
                }
            }, meteorConfig.duration * 1000 + 100);
        }
        
        getMeteorType() {
            const rand = Math.random();
            if (rand < 0.3) return 'bright';      // 30% terang
            if (rand < 0.6) return 'dim';        // 30% redup
            if (rand < 0.8) return 'glowing';    // 20% berpendar
            return 'normal';                      // 20% normal
        }
        
        getMeteorConfig(type) {
            const configs = {
                bright: {
                    duration: 1.5 + Math.random() * 2,         // 1.5-3.5s (cepat)
                    size: '4px',
                    coreOpacity: 0.9,
                    maxOpacity: 1,
                    tailLength: '100px',
                    tailWidth: '3px',
                    tailGlow: '8px',
                    easing: 'ease-out',
                    trajectoryVariation: 1.2,
                    fadePattern: 'quick'
                },
                dim: {
                    duration: 3 + Math.random() * 4,           // 3-7s (lambat)
                    size: '2px',
                    coreOpacity: 0.4,
                    maxOpacity: 0.6,
                    tailLength: '60px',
                    tailWidth: '1.5px',
                    tailGlow: '3px',
                    easing: 'linear',
                    trajectoryVariation: 0.8,
                    fadePattern: 'gradual'
                },
                glowing: {
                    duration: 2 + Math.random() * 3,           // 2-5s (sedang)
                    size: '5px',
                    coreOpacity: 1,
                    maxOpacity: 1,
                    tailLength: '120px',
                    tailWidth: '4px',
                    tailGlow: '12px',
                    easing: 'ease-in-out',
                    trajectoryVariation: 1.1,
                    fadePattern: 'glow'
                },
                normal: {
                    duration: 2.5 + Math.random() * 2.5,       // 2.5-5s (normal)
                    size: '3px',
                    coreOpacity: 0.7,
                    maxOpacity: 0.8,
                    tailLength: '80px',
                    tailWidth: '2px',
                    tailGlow: '6px',
                    easing: 'ease-in',
                    trajectoryVariation: 1,
                    fadePattern: 'normal'
                }
            };
            
            return configs[type];
        }
        
        configureMeteorAnimation(meteor, config, startX, startY, endX, endY, angle) {
            // Basic properties
            meteor.style.setProperty('--meteor-size', config.size);
            meteor.style.setProperty('--core-opacity', config.coreOpacity);
            meteor.style.setProperty('--duration', config.duration + 's');
            meteor.style.setProperty('--easing', config.easing);
            
            // Tail properties
            meteor.style.setProperty('--tail-length', config.tailLength);
            meteor.style.setProperty('--tail-width', config.tailWidth);
            meteor.style.setProperty('--inner-tail-length', (parseInt(config.tailLength) * 0.5) + 'px');
            meteor.style.setProperty('--inner-tail-width', (parseFloat(config.tailWidth) * 0.5) + 'px');
            meteor.style.setProperty('--tail-rotation', angle + 'deg');
            meteor.style.setProperty('--tail-glow', config.tailGlow);
            
            // Tail opacity variations
            meteor.style.setProperty('--tail-start-opacity', (config.coreOpacity * 0.2).toFixed(2));
            meteor.style.setProperty('--tail-mid-opacity', (config.coreOpacity * 0.5).toFixed(2));
            meteor.style.setProperty('--tail-end-opacity', (config.coreOpacity * 0.8).toFixed(2));
            meteor.style.setProperty('--tail-glow-opacity', (config.coreOpacity * 0.4).toFixed(2));
            meteor.style.setProperty('--inner-tail-opacity', (config.coreOpacity * 0.6).toFixed(2));
            
            // Animation path
            meteor.style.setProperty('--start-x', '0px');
            meteor.style.setProperty('--start-y', '0px');
            meteor.style.setProperty('--end-x', (endX - startX) + 'px');
            meteor.style.setProperty('--end-y', (endY - startY) + 'px');
            
            this.configureFadePattern(meteor, config);
        }
        
        configureFadePattern(meteor, config) {
            let fadeInPoint, fadeOutPoint, maxOpacity, fadeOutOpacity;
            let startScale, peakScale, midScale, endScale;
            let fadeInProgress, fadeOutProgress;
            
            switch (config.fadePattern) {
                case 'quick':
                    fadeInPoint = '5%';
                    fadeOutPoint = '70%';
                    maxOpacity = config.maxOpacity;
                    fadeOutOpacity = 0.4;
                    startScale = 0.3;
                    peakScale = 1.2;
                    midScale = 1;
                    endScale = 0.2;
                    fadeInProgress = 0.05;
                    fadeOutProgress = 0.7;
                    break;
                    
                case 'gradual':
                    fadeInPoint = '20%';
                    fadeOutPoint = '80%';
                    maxOpacity = config.maxOpacity;
                    fadeOutOpacity = config.maxOpacity * 0.7;
                    startScale = 0.8;
                    peakScale = 1;
                    midScale = 0.9;
                    endScale = 0.6;
                    fadeInProgress = 0.2;
                    fadeOutProgress = 0.8;
                    break;
                    
                case 'glow':
                    fadeInPoint = '10%';
                    fadeOutPoint = '85%';
                    maxOpacity = config.maxOpacity;
                    fadeOutOpacity = 0.2;
                    startScale = 0.5;
                    peakScale = 1.5;
                    midScale = 1.2;
                    endScale = 0.1;
                    fadeInProgress = 0.1;
                    fadeOutProgress = 0.85;
                    break;
                    
                default: // normal
                    fadeInPoint = '15%';
                    fadeOutPoint = '75%';
                    maxOpacity = config.maxOpacity;
                    fadeOutOpacity = 0.3;
                    startScale = 0.5;
                    peakScale = 1.1;
                    midScale = 1;
                    endScale = 0.3;
                    fadeInProgress = 0.15;
                    fadeOutProgress = 0.75;
                    break;
            }
            
            meteor.style.setProperty('--fade-in-point', fadeInPoint);
            meteor.style.setProperty('--fade-out-point', fadeOutPoint);
            meteor.style.setProperty('--max-opacity', maxOpacity);
            meteor.style.setProperty('--fade-out-opacity', fadeOutOpacity);
            meteor.style.setProperty('--start-scale', startScale);
            meteor.style.setProperty('--peak-scale', peakScale);
            meteor.style.setProperty('--mid-scale', midScale);
            meteor.style.setProperty('--end-scale', endScale);
            meteor.style.setProperty('--fade-in-progress', fadeInProgress);
            meteor.style.setProperty('--fade-out-progress', fadeOutProgress);
        }
        
        startMeteorShower() {
            const createRandomMeteor = () => {
                this.createMeteor();
                const nextMeteor = Math.random() * 5000 + 1000;
                setTimeout(createRandomMeteor, nextMeteor);
            };
            
            const firstMeteor = Math.random() * 1500 + 500;
            setTimeout(createRandomMeteor, firstMeteor);
        }
        
        handleResize() {
            this.stars.forEach(star => {
                if (star.parentNode) {
                    star.parentNode.removeChild(star);
                }
            });
            this.stars = [];

            this.generateStars(150);
        }
        
        destroy() {
            if (this.container && this.container.parentNode) {
                this.container.parentNode.removeChild(this.container);
            }
        }
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            window.starrySky = new StarrySky();
        });
    } else {
        window.starrySky = new StarrySky();
    }
    
    window.StarrySky = StarrySky;
})();