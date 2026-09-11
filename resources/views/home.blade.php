<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>CLASHOFCLANBEBANKLAN | 3D Printing Chaos & CoC Loot Hub</title>

  <!-- Google Fonts: Space Grotesk & JetBrains Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;700;800&family=Space+Grotesk:wght@600;700;900&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Space Grotesk"', 'sans-serif'],
            mono: ['"JetBrains Mono"', 'monospace'],
          },
          colors: {
            brand: {
              yellow: '#FFDF00',
              gold: '#FBBF24',
              orange: '#FF5400',
              cyan: '#00F0FF',
              pink: '#FF2E93',
              green: '#00E575',
              gem: '#10B981',
              dark: '#121212',
              bg: '#FFFDF5',
              wood: '#8B4513',
              stone: '#334155'
            }
          },
          boxShadow: {
            'brutal-sm': '3px 3px 0px 0px #121212',
            'brutal': '5px 5px 0px 0px #121212',
            'brutal-lg': '8px 8px 0px 0px #121212',
            'brutal-hero': '12px 12px 0px 0px #121212',
          }
        }
      }
    }
  </script>

  <style>
    :root {
      --safe-bottom: env(safe-area-inset-bottom, 0px);
    }
    body {
      background-color: #FFFDF5;
      background-image: 
        radial-gradient(#121212 0.85px, transparent 0.85px),
        linear-gradient(to bottom, rgba(255, 223, 0, 0.05), transparent 400px);
      background-size: 24px 24px, 100% 100%;
      color: #121212;
      overflow-x: hidden;
      font-family: 'Space Grotesk', sans-serif;
    }

    /* Kinetic Marquee */
    @keyframes marquee {
      0% { transform: translateX(0%); }
      100% { transform: translateX(-50%); }
    }
    .animate-marquee {
      display: flex;
      width: 200%;
      animation: marquee 18s linear infinite;
    }
    .animate-marquee:hover {
      animation-play-state: paused;
    }

    /* Coffee Steam & Mascot Keyframes */
    @keyframes steam {
      0% { transform: translateY(0) scaleX(1); opacity: 0.8; }
      50% { transform: translateY(-8px) scaleX(1.15); opacity: 1; }
      100% { transform: translateY(-16px) scaleX(0.9); opacity: 0; }
    }
    .animate-steam-1 { animation: steam 1.7s ease-out infinite; }
    .animate-steam-2 { animation: steam 2.1s ease-out infinite 0.5s; }

    @keyframes queen-idle {
      0%, 100% { transform: translateY(0px) rotate(-1deg); }
      50% { transform: translateY(-6px) rotate(1.5deg); }
    }
    @keyframes king-idle {
      0%, 100% { transform: translateY(0px) rotate(1deg); }
      50% { transform: translateY(-7px) rotate(-2deg); }
    }
    @keyframes bubble-pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05) rotate(-1deg); }
    }
    .animate-queen {
      animation: queen-idle 3.2s ease-in-out infinite;
      transform-origin: bottom center;
    }
    .animate-king {
      animation: king-idle 2.8s ease-in-out infinite;
      transform-origin: bottom center;
    }
    .animate-bubble-pulse {
      animation: bubble-pulse 2.4s ease-in-out infinite;
    }

    /* Tactile Interaction Styles */
    .mascot-interactive {
      transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1), filter 0.2s ease;
      cursor: pointer;
    }
    .mascot-interactive:hover {
      transform: scale(1.06) translateY(-4px);
      filter: drop-shadow(0px 8px 0px #121212);
    }
    .mascot-interactive:active {
      transform: scale(0.95) translateY(2px);
    }

    .donate-card-hero {
      transition: transform 0.22s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.22s ease;
      cursor: pointer;
    }
    @media (hover: hover) {
      .donate-card-hero:hover {
        transform: translate(-4px, -4px) rotate(-0.5deg);
        box-shadow: 16px 16px 0px 0px #121212;
      }
    }
    .donate-card-hero:active {
      transform: translate(3px, 3px) scale(0.985);
      box-shadow: 3px 3px 0px 0px #121212;
    }

    .product-card {
      transition: transform 0.18s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.18s ease;
    }
    @media (hover: hover) {
      .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 8px 8px 0px 0px #121212;
      }
      .product-card:hover .product-img {
        transform: scale(1.06);
      }
    }
    .product-card:active {
      transform: translate(2px, 2px) scale(0.98);
      box-shadow: 2px 2px 0px 0px #121212;
    }

    .safe-bottom-padding {
      padding-bottom: calc(5.5rem + var(--safe-bottom));
    }
    .safe-bar-offset {
      padding-bottom: calc(0.85rem + var(--safe-bottom));
    }

    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    @media (prefers-reduced-motion: reduce) {
      .animate-queen, .animate-king, .animate-bubble-pulse, .animate-steam-1, .animate-steam-2, .animate-marquee {
        animation: none !important;
        transform: none !important;
      }
    }
  </style>
</head>

<body class="safe-bottom-padding antialiased selection:bg-brand-yellow selection:text-black min-h-screen">

  <!-- TOP KINETIC MARQUEE -->
  <div class="bg-brand-dark text-white border-b-4 border-black py-2.5 overflow-hidden select-none font-mono text-xs md:text-sm font-bold tracking-wider">
    <div class="animate-marquee whitespace-nowrap flex items-center gap-8">
      <span class="flex items-center gap-2 text-brand-yellow">⚔️ CLAN WAR STATUS: 100% DESTRUCTION</span>
      <span class="text-brand-green">💎 LOOT READY • INSTANT COC DELIVERY</span>
      <span class="text-brand-orange">🛡️ JASA JOKI WALL & RANK AKTIF</span>
      <span class="text-brand-cyan">☕ TRAKTIR KAFEIN BUAT NGOPREK & WAR</span>
      <span class="text-brand-pink">⚡ 260°C NOZZLE SPEEDRUN • BEBAN KLAN SINCE DAY 1</span>
      <!-- Repeated for continuous marquee loop -->
      <span class="flex items-center gap-2 text-brand-yellow">⚔️ CLAN WAR STATUS: 100% DESTRUCTION</span>
      <span class="text-brand-green">💎 LOOT READY • INSTANT COC DELIVERY</span>
      <span class="text-brand-orange">🛡️ JASA JOKI WALL & RANK AKTIF</span>
      <span class="text-brand-cyan">☕ TRAKTIR KAFEIN BUAT NGOPREK & WAR</span>
      <span class="text-brand-pink">⚡ 260°C NOZZLE SPEEDRUN • BEBAN KLAN SINCE DAY 1</span>
    </div>
  </div>

  <main class="max-w-xl mx-auto px-3 sm:px-4 pt-4 md:pt-7 flex flex-col gap-5">

    <!-- ============================================================== -->
    <!-- 1. PROFILE / HERO (TikTok Creator Live Profile Card)           -->
    <!-- ============================================================== -->
    <header class="bg-white border-4 border-black p-4 sm:p-5 rounded-2xl shadow-brutal-lg relative overflow-hidden">
      
      <!-- Top Badges: TikTok Live Indicator & Link -->
      <div class="flex items-center justify-between gap-2 mb-3.5">
        <a id="tiktokTopBadgeLink" href="https://www.tiktok.com/@clashofclansbebanklan" target="_blank" rel="noopener noreferrer" 
           class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-black text-white border-2 border-black rounded-full text-[10px] sm:text-[11px] font-mono font-black shadow-brutal-sm hover:bg-neutral-800 transition">
          <span class="w-2 h-2 rounded-full bg-[#00F2FE] animate-ping"></span>
          <span>🎵 TIKTOK CREATOR</span>
          <span class="text-[9px] bg-[#FE2C55] text-white px-1.5 py-0.2 rounded font-bold">LIVE</span>
        </a>

        <a id="tiktokOpenDirectBtn" href="https://www.tiktok.com/@clashofclansbebanklan" target="_blank" rel="noopener noreferrer" 
           class="inline-flex items-center gap-1 px-2.5 py-1 bg-brand-yellow hover:bg-yellow-300 border-2 border-black rounded-lg text-[10px] sm:text-[11px] font-mono font-black shadow-brutal-sm transition active:translate-y-0.5">
          <span>BUKA TIKTOK</span>
          <span>➔</span>
        </a>
      </div>

      <!-- Avatar, Handle & Quick Follow -->
      <div class="flex items-start gap-3.5 sm:gap-4">
        
        <!-- TikTok Avatar (Permanen & Terkunci - Direct Link ke TikTok) -->
        <div class="relative shrink-0 group">
          <a id="tiktokAvatarLink" href="https://www.tiktok.com/@clashofclansbebanklan" target="_blank" rel="noopener noreferrer" 
             class="block w-20 h-20 sm:w-22 sm:h-22 bg-gradient-to-tr from-[#FE2C55] via-black to-[#00F2FE] p-1 border-3 border-black rounded-2xl shadow-brutal transition transform group-hover:scale-105 overflow-hidden relative cursor-pointer"
             title="Lihat Akun Resmi TikTok @clashofclansbebanklan">
            <img id="tiktokAvatarImg" 
                 src="https://ibb.co.com/XfNvBssL" 
                 alt="TikTok Profile Avatar - clashofclanbebanklan" 
                 class="w-full h-full object-cover object-center rounded-xl bg-neutral-900 border border-black/40"
                 onerror="handleAvatarError(this)" />
          </a>
          <!-- TikTok Music Icon Badge -->
          <span class="absolute -bottom-1.5 -right-1 bg-black text-white text-[11px] p-1 border-2 border-black rounded-lg shadow-brutal-sm flex items-center justify-center select-none pointer-events-none">
            ♫
          </span>
        </div>

        <!-- TikTok Username, Verified Badge & Follow Button -->
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-1.5 flex-wrap">
            <h1 id="tiktokDisplayName" class="text-base sm:text-lg md:text-xl font-black tracking-tight leading-none uppercase text-black truncate">
              CLASHOFCLANSBEBANKLAN
            </h1>
            <!-- Verified Creator Badge -->
            <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#00F2FE] border border-black text-[9px] font-black text-black" title="Verified Creator">
              ✓
            </span>
          </div>

          <div class="mt-1 flex items-center gap-1.5">
            <span id="tiktokHandle" class="text-xs sm:text-sm font-mono font-bold text-gray-700 truncate">
              @clashofclansbebanklan
            </span>
          </div>

          <!-- Direct Follow CTA Button -->
          <div class="mt-2">
            <a id="tiktokFollowCta" href="https://www.tiktok.com/@clashofclansbebanklan" target="_blank" rel="noopener noreferrer" 
               class="inline-flex items-center gap-1.5 bg-[#FE2C55] hover:bg-rose-600 active:scale-95 text-white font-mono font-black text-[11px] sm:text-xs px-3 py-1.5 rounded-xl border-2 border-black shadow-brutal-sm transition">
              <span>+ Follow di TikTok</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Creator TikTok Bio -->
      <div class="mt-3.5 pt-3 border-t-2 border-dashed border-gray-300">
        <p id="tiktokBio" class="text-xs sm:text-sm font-bold text-gray-800 leading-snug">
          “Ngoprek Klipper, bikin printer makin kencang, dan sesekali bikin masalah baru buat diselesaikan.”
        </p>
      </div>

      <!-- Real-Time TikTok Stats (Following, Followers, Likes) -->
      <div class="grid grid-cols-3 gap-1.5 sm:gap-2 mt-3 text-center font-mono select-none">
        
        <!-- Following -->
        <div class="bg-gray-100 border-2 border-black p-1.5 rounded-xl shadow-brutal-sm">
          <div class="text-[9px] text-gray-600 font-extrabold uppercase tracking-wider">Mengikuti</div>
          <div id="tiktokStatFollowing" class="text-xs sm:text-sm font-black text-black mt-0.5">
            142
          </div>
        </div>

        <!-- Followers -->
        <div class="bg-cyan-50 border-2 border-black p-1.5 rounded-xl shadow-brutal-sm">
          <div class="text-[9px] text-cyan-900 font-extrabold uppercase tracking-wider flex items-center justify-center gap-0.5">
            <span>Pengikut</span>
            <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 animate-pulse"></span>
          </div>
          <div id="tiktokStatFollowers" class="text-xs sm:text-sm font-black text-black mt-0.5">
            28.4K
          </div>
        </div>

        <!-- Likes -->
        <div class="bg-rose-50 border-2 border-black p-1.5 rounded-xl shadow-brutal-sm">
          <div class="text-[9px] text-rose-900 font-extrabold uppercase tracking-wider">Suka ❤️</div>
          <div id="tiktokStatLikes" class="text-xs sm:text-sm font-black text-[#FE2C55] mt-0.5">
            185.9K
          </div>
        </div>

      </div>

      <!-- Small Live Data Footer -->
      <div class="mt-2.5 flex items-center justify-between text-[9px] font-mono text-gray-500 font-bold px-0.5">
        <span class="flex items-center gap-1">
          <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
          <span>Akun TikTok Terverifikasi</span>
        </span>
        <span class="text-gray-400">Data Terkini</span>
      </div>

    </header>

    <!-- ============================================================== -->
    <!-- 2. ☕ SUPPORT THE CHAOS — DONATE (#1 PRIMARY HERO CTA)          -->
    <!-- ============================================================== -->
    <section class="relative">
      <div class="absolute -inset-1 bg-gradient-to-r from-brand-yellow via-brand-orange to-brand-yellow rounded-3xl blur-sm opacity-75 -z-10"></div>

      <div id="primaryDonateCard" 
           onclick="openDonateModal()" 
           role="button"
           tabindex="0"
           aria-label="Support the creator with coffee"
           class="donate-card-hero bg-brand-yellow border-4 border-black rounded-3xl p-4 sm:p-5 md:p-6 shadow-brutal-hero relative overflow-hidden select-none">
        
        <!-- Priority Flag -->
        <div class="absolute -top-1 -right-1 bg-brand-orange text-white border-2 border-black font-mono font-black text-[10px] sm:text-xs px-3 py-1 rounded-bl-xl shadow-brutal-sm flex items-center gap-1 z-20">
          <span class="animate-pulse">☕</span>
          <span>SUPPORT CREATOR</span>
        </div>

        <!-- Flex Container: Left Content + Right ARCHER QUEEN Fan-Art Mascot -->
        <div class="flex items-end justify-between gap-2 sm:gap-4 relative z-10">
          
          <!-- Left Column: Copy & Primary Button -->
          <div class="max-w-[58%] sm:max-w-[62%] flex flex-col justify-between">
            <div>
              <div class="inline-flex items-center gap-1 bg-black text-brand-yellow px-2 py-0.5 rounded text-[10px] sm:text-[11px] font-mono font-black mb-1.5 shadow-brutal-sm">
                <span>☕</span>
                <span>CREATOR FUEL</span>
              </div>

              <h2 class="text-xl sm:text-2xl md:text-3xl font-black tracking-tight text-brand-dark leading-none uppercase">
                ☕ SUPPORT THE CHAOS
              </h2>

              <p class="mt-2 text-xs sm:text-sm font-extrabold text-gray-950 leading-snug">
                Kalau kontenku ngebantu, traktir aku kopi buat lanjut ngoprek printer, bikin konten, dan beli filament.
              </p>
            </div>

            <div class="mt-3.5 sm:mt-4">
              <div class="inline-flex items-center justify-center gap-2 bg-black hover:bg-neutral-900 text-white font-mono font-black text-xs sm:text-sm md:text-base px-4 py-2.5 sm:px-6 sm:py-3 rounded-xl border-3 border-black shadow-brutal transition-all">
                <span>DONATE →</span>
              </div>
            </div>
          </div>

          <!-- Right Column: ARCHER QUEEN Fan-Art Mascot Illustration -->
          <div class="shrink-0 w-36 sm:w-44 md:w-48 flex flex-col items-center justify-end relative pointer-events-auto mascot-interactive animate-queen" 
               onclick="event.stopPropagation(); triggerMascotCheer('queen')"
               title="Archer Queen Fan-Art Mascot! Tap to chat!">
            
            <!-- Comic Speech Bubble -->
            <div class="mb-1 bg-white border-2 border-black rounded-xl px-2 py-1 shadow-brutal-sm text-[9px] sm:text-[10px] font-mono font-black text-purple-950 whitespace-nowrap animate-bubble-pulse relative">
              <span>"TRAKTIR KOPI DULU! ☕"</span>
              <div class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-2 h-2 bg-white border-b-2 border-r-2 border-black rotate-45"></div>
            </div>

            <!-- ARCHER QUEEN ORIGINAL FAN-ART SVG -->
            <svg class="w-32 sm:w-40 md:w-44 h-auto overflow-visible select-none drop-shadow-[4px_4px_0px_#121212]" viewBox="0 0 170 215" fill="none" xmlns="http://www.w3.org/2000/svg">
              <!-- Radial Magic Aura Backdrop -->
              <circle cx="85" cy="115" r="62" fill="#C084FC" fill-opacity="0.3" stroke="#121212" stroke-width="3" stroke-dasharray="4 4" />

              <!-- Iconic Giant X-Bow / Recurve Bow on Her Back -->
              <g id="queen-archer-bow">
                <!-- Bow Wooden/Iron Limbs -->
                <path d="M125 35 C158 65 168 150 134 195" stroke="#121212" stroke-width="8" stroke-linecap="round" />
                <path d="M125 35 C158 65 168 150 134 195" stroke="#00F0FF" stroke-width="4.5" stroke-linecap="round" />
                <!-- Bow Crossbar & Energy String -->
                <line x1="125" y1="35" x2="134" y2="195" stroke="#FF2E93" stroke-width="2.5" stroke-dasharray="5 3" />
                <!-- Gold Crystal Bow Tips -->
                <polygon points="125,28 132,38 118,38" fill="#FBBF24" stroke="#121212" stroke-width="2.5" />
                <polygon points="134,202 141,192 127,192" fill="#FBBF24" stroke="#121212" stroke-width="2.5" />
                <!-- Central Recurve Grip -->
                <rect x="145" y="105" width="12" height="24" rx="4" fill="#F59E0B" stroke="#121212" stroke-width="3" />
              </g>

              <!-- Archer Queen Forest Green Cape -->
              <path d="M52 82 C44 125 40 170 32 198 C64 206 104 206 138 198 C130 170 126 125 118 82 Z" fill="#047857" stroke="#121212" stroke-width="4.5" stroke-linejoin="round" />
              <!-- Cape Folds & Gold Trim -->
              <path d="M46 115 C52 155 58 185 68 200" stroke="#059669" stroke-width="3.5" stroke-linecap="round" />
              <path d="M124 115 C118 155 112 185 102 200" stroke="#059669" stroke-width="3.5" stroke-linecap="round" />
              <path d="M38 198 Q85 210 132 198" stroke="#FBBF24" stroke-width="4" stroke-linecap="round" />

              <!-- Steaming Giant Barista Mug in Left Hand -->
              <g id="queen-coffee-cup">
                <rect x="16" y="105" width="34" height="36" rx="7" fill="#121212" stroke="#121212" stroke-width="4" />
                <rect x="19" y="108" width="28" height="30" rx="5" fill="#FF5400" />
                <!-- Mug Handle -->
                <path d="M16 112 H9 C6 112 6 132 9 132 H16" stroke="#121212" stroke-width="4" fill="none" stroke-linecap="round" />
                <!-- Coffee Emblem -->
                <circle cx="33" cy="123" r="6" fill="#FFDF00" stroke="#121212" stroke-width="2" />
                <text x="33" y="126" text-anchor="middle" font-family="monospace" font-size="8" font-weight="900" fill="#121212">☕</text>
                <!-- Rising Steam Lines -->
                <path d="M25 98 C23 90 29 86 27 79" stroke="#FF5400" stroke-width="2.5" stroke-linecap="round" class="animate-steam-1" />
                <path d="M34 96 C32 88 38 84 36 76" stroke="#FFDF00" stroke-width="2.5" stroke-linecap="round" class="animate-steam-2" />
              </g>

              <!-- Archer Queen Torso & Battle Corset -->
              <path d="M62 86 L108 86 L102 152 L68 152 Z" fill="#2E1065" stroke="#121212" stroke-width="4" />
              <path d="M70 94 L100 94 L96 142 L74 142 Z" fill="#6B21A8" stroke="#121212" stroke-width="2.5" />
              <!-- Golden Belt & Royal Eagle/Gem Buckle -->
              <rect x="65" y="142" width="40" height="10" rx="2" fill="#1E1B4B" stroke="#121212" stroke-width="3" />
              <polygon points="85,138 93,147 85,156 77,147" fill="#FBBF24" stroke="#121212" stroke-width="2" />
              <circle cx="85" cy="147" r="2.5" fill="#00F0FF" />

              <!-- Left Arm Holding Coffee -->
              <path d="M64 88 C44 94 38 104 40 120" stroke="#121212" stroke-width="8.5" stroke-linecap="round" />
              <path d="M64 88 C44 94 38 104 40 120" stroke="#C084FC" stroke-width="5" stroke-linecap="round" />
              
              <!-- Right Arm on Hip -->
              <path d="M106 88 C120 96 122 114 108 126" stroke="#121212" stroke-width="8.5" stroke-linecap="round" />
              <path d="M106 88 C120 96 122 114 108 126" stroke="#C084FC" stroke-width="5" stroke-linecap="round" />

              <!-- Spiked Golden Pauldrons (Left & Right) -->
              <circle cx="62" cy="85" r="10" fill="#FBBF24" stroke="#121212" stroke-width="3" />
              <circle cx="108" cy="85" r="10" fill="#FBBF24" stroke="#121212" stroke-width="3" />
              <polygon points="58,75 62,67 66,75" fill="#EF4444" stroke="#121212" stroke-width="2" />
              <polygon points="104,75 108,67 112,75" fill="#EF4444" stroke="#121212" stroke-width="2" />

              <!-- Iconic Long Flowing Purple Hair (Back Locks) -->
              <path d="M54 52 C30 76 34 130 42 160 C50 140 54 85 60 68 Z" fill="#581C87" stroke="#121212" stroke-width="4" />
              <path d="M116 52 C140 76 136 130 128 160 C120 140 116 85 110 68 Z" fill="#581C87" stroke="#121212" stroke-width="4" />

              <!-- Archer Queen Face & Cheek -->
              <path d="M68 50 C68 36 102 36 102 50 C102 70 92 80 85 82 C78 80 68 70 68 50 Z" fill="#FED7AA" stroke="#121212" stroke-width="4" />
              <!-- Confident Smirk, Eyes, Eyebrows -->
              <path d="M74 50 Q78 45 81 50" stroke="#121212" stroke-width="3" stroke-linecap="round" />
              <circle cx="78" cy="52" r="2.5" fill="#7E22CE" />
              <path d="M89 50 Q92 45 96 50" stroke="#121212" stroke-width="3" stroke-linecap="round" />
              <circle cx="92" cy="52" r="2.5" fill="#7E22CE" />
              <!-- Battle Cheek Scar -->
              <line x1="71" y1="58" x2="76" y2="60" stroke="#FF2E93" stroke-width="2.5" stroke-linecap="round" />
              <!-- Smug Queen Grin -->
              <path d="M79 67 Q86 72 90 65" stroke="#121212" stroke-width="3" stroke-linecap="round" fill="none" />

              <!-- Iconic Purple Hair Front Bangs & Volume -->
              <path d="M62 46 C70 30 100 30 108 46 C100 54 90 46 85 50 C80 46 70 54 62 46 Z" fill="#7E22CE" stroke="#121212" stroke-width="4" />
              <path d="M75 38 L72 54 L80 44 Z" fill="#A855F7" />
              <path d="M95 38 L98 54 L90 44 Z" fill="#A855F7" />

              <!-- Iconic Golden Archer Queen Crown / Tiara (3-Points with Cyan Gem) -->
              <polygon points="68,34 85,18 102,34 96,38 85,30 74,38" fill="#FBBF24" stroke="#121212" stroke-width="3.5" />
              <polygon points="81,26 85,20 89,26 85,31" fill="#00F0FF" stroke="#121212" stroke-width="1.8" />
              <circle cx="85" cy="25" r="2" fill="#FFFFFF" />
            </svg>
          </div>

        </div>

        <!-- Channels Strip -->
        <div class="mt-3 sm:mt-4 pt-2.5 border-t-2 border-black/20 flex items-center justify-between gap-1.5 text-[10px] sm:text-xs font-mono font-black text-black/85">
          <span>⚡ Saweria • Trakteer • QRIS • Ko-fi • PayPal</span>
          <span class="text-[9px] bg-black text-brand-yellow px-1.5 py-0.5 rounded uppercase font-bold">Tap Queen for voice 👆</span>
        </div>
      </div>
    </section>

    <!-- ============================================================== -->
    <!-- 3. 🤖 TRY AI KLIPPER — AFFILIATE (#2 SECONDARY CTA)             -->
    <!-- ============================================================== -->
    <section class="relative">
      <div id="secondaryAiCard" 
           onclick="openAiAffiliate()" 
           role="button"
           tabindex="0"
           aria-label="Try AI Klipper Assistant"
           class="bg-cyan-50 hover:bg-cyan-100 border-3 border-black rounded-2xl p-4 sm:p-5 shadow-brutal hover:shadow-brutal-lg transition-all transform hover:-translate-y-0.5 active:translate-y-0.5 active:shadow-brutal-sm cursor-pointer relative overflow-hidden">
        
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="inline-flex items-center gap-1.5 bg-brand-cyan text-black border-2 border-black px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-mono font-extrabold shadow-brutal-sm mb-1.5">
              <span class="w-1.5 h-1.5 rounded-full bg-black"></span>
              <span>AI POWERED</span>
            </div>

            <h3 class="text-lg sm:text-xl font-black tracking-tight text-black flex items-center gap-1">
              <span>🤖 TRY AI KLIPPER</span>
            </h3>

            <p class="mt-1.5 text-xs sm:text-sm font-bold text-gray-700 leading-relaxed max-w-sm">
              Bantu bikin, troubleshoot, dan ngoprek konfigurasi Klipper dengan AI.
            </p>
          </div>

          <div class="shrink-0 self-center">
            <div class="bg-black text-brand-cyan font-mono font-black text-xs sm:text-sm px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl border-2 border-black shadow-brutal-sm flex items-center gap-1 hover:bg-neutral-800 transition">
              <span>TRY IT NOW →</span>
            </div>
          </div>
        </div>

        <div class="mt-2.5 pt-2.5 border-t border-black/15 flex flex-wrap gap-1.5 text-[10px] sm:text-[11px] font-mono font-bold text-gray-600">
          <span class="bg-white/80 border border-black/30 px-1.5 py-0.5 rounded">#MacroGenerator</span>
          <span class="bg-white/80 border border-black/30 px-1.5 py-0.5 rounded">#BedMeshFix</span>
          <span class="bg-white/80 border border-black/30 px-1.5 py-0.5 rounded">#ConfigTuner</span>
        </div>
      </div>
    </section>

    <!-- ============================================================== -->
    <!-- 3.5. 🏆 TOP DONATUR / SULTAN KLAN (HALL OF FAME LEADERBOARD)   -->
    <!-- ============================================================== -->
    <section id="topDonaturSection" class="space-y-3 pt-1">
      
      <!-- Leaderboard Header Card -->
      <div class="bg-gradient-to-r from-amber-400 via-brand-yellow to-yellow-300 border-3 sm:border-4 border-black p-3.5 sm:p-4 rounded-2xl shadow-brutal flex items-center justify-between gap-2 relative overflow-hidden">
        
        <div class="flex items-center gap-2.5 sm:gap-3 z-10 min-w-0">
          <div class="w-10 h-10 bg-black text-brand-yellow rounded-xl border-2 border-black flex items-center justify-center font-black text-xl shadow-brutal-sm shrink-0">
            🏆
          </div>
          <div>
            <div class="inline-flex items-center gap-1.5 bg-black text-brand-yellow px-2 py-0.5 rounded-lg border border-black shadow-brutal-sm font-mono text-[9px] sm:text-[10px] font-black mb-1">
              <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow animate-ping"></span>
              <span>HALL OF SULTAN • LIVE RANK</span>
            </div>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-black uppercase tracking-tight text-black leading-none">
              🏆 TOP DONATUR KLAN
            </h2>
            <p class="text-[10px] sm:text-xs font-mono font-black text-amber-950 uppercase mt-1 tracking-wide">
              SUPPORTER TERBARBAR MARKAS BEBANKLAN
            </p>
          </div>
        </div>

        <button onclick="openDonateModal()" 
                class="shrink-0 bg-black hover:bg-neutral-800 text-brand-yellow border-2 border-black px-3 py-1.5 rounded-xl shadow-brutal-sm font-mono text-[10px] sm:text-xs font-black transition active:scale-95 flex items-center gap-1">
          <span>GAS GESER #1</span>
          <span>➔</span>
        </button>
      </div>

      <!-- Motivation Callout & Filter Tabs -->
      <div class="bg-white border-2 sm:border-3 border-black p-3 rounded-xl shadow-brutal-sm flex flex-col sm:flex-row items-center justify-between gap-2.5">
        <div class="flex items-center gap-2 text-xs font-bold text-gray-800 font-mono text-center sm:text-left">
          <span>👑</span>
          <span>Traktir kopi/filament & nama lu bakal dipajang permanen di ranking markas!</span>
        </div>

        <!-- Toggle Tabs: Bulan Ini vs All-Time -->
        <div class="flex items-center bg-gray-100 p-1 rounded-xl border-2 border-black shrink-0 font-mono text-[10px] font-black">
          <button id="tabMonthlyBtn" 
                  onclick="switchLeaderboardTab('monthly')" 
                  class="bg-black text-white px-2.5 py-1 rounded-lg border border-black transition shadow-brutal-sm">
            ⚡ BULAN INI
          </button>
          <button id="tabAllTimeBtn" 
                  onclick="switchLeaderboardTab('allTime')" 
                  class="bg-transparent text-gray-700 hover:text-black px-2.5 py-1 rounded-lg transition">
            👑 ALL-TIME SULTAN
          </button>
        </div>
      </div>

      <!-- Dynamic Top Donator Podium & List Container -->
      <div id="leaderboardContainer" class="space-y-2">
        <!-- Rendered dynamically by JavaScript -->
      </div>

      <!-- Overtake CTA Strip -->
      <div onclick="openDonateModal()" 
           role="button"
           tabindex="0"
           class="bg-gradient-to-r from-yellow-300 via-brand-yellow to-amber-400 border-2 sm:border-3 border-black p-3 rounded-xl shadow-brutal hover:shadow-brutal-lg transition active:translate-y-0.5 cursor-pointer flex items-center justify-between gap-2 select-none">
        <div class="flex items-center gap-2 min-w-0">
          <span class="text-xl shrink-0 animate-bounce">🔥</span>
          <div class="min-w-0">
            <div class="text-[11px] sm:text-xs font-black text-black uppercase tracking-tight truncate">
              MAU GESER SULTAN RANK #1 & TAMPIL DI TOP LIST?
            </div>
            <div class="text-[9px] sm:text-[10px] font-mono font-bold text-amber-950">
              Setiap donasi via Saweria / Trakteer / QRIS otomatis dicatat klan!
            </div>
          </div>
        </div>
        <div class="bg-black text-brand-yellow font-mono font-black text-[10px] sm:text-xs px-3 py-1.5 rounded-lg border-2 border-black shadow-brutal-sm shrink-0 whitespace-nowrap">
          TRAKTIR SEKARANG ➔
        </div>
      </div>

    </section>

    <!-- ============================================================== -->
    <!-- 4. ⚔️ COC ITEM SHOP (Single Instance - Main Shop Area)          -->
    <!-- ============================================================== -->
    <section id="cocShopSection" class="space-y-3 pt-1">
      
      <!-- Shop Section Header -->
      <div class="bg-gradient-to-r from-amber-400 via-brand-yellow to-amber-300 border-3 sm:border-4 border-black p-3.5 sm:p-4 rounded-2xl shadow-brutal flex items-center justify-between gap-2 relative overflow-hidden">
        
        <div class="flex items-center gap-2.5 sm:gap-3 z-10 min-w-0">
          <span class="text-2xl sm:text-3xl select-none shrink-0">⚔️</span>
          <div>
            <div class="inline-flex items-center gap-1.5 bg-black text-brand-green px-2 py-0.5 rounded-lg border border-black shadow-brutal-sm font-mono text-[9px] sm:text-[10px] font-black mb-1">
              <span class="w-1.5 h-1.5 rounded-full bg-brand-green animate-ping"></span>
              <span>SHOP OPEN • READY STOCK</span>
            </div>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-black uppercase tracking-tight text-black leading-none">
              ⚔️ COC ITEM SHOP
            </h2>
            <p class="text-[10px] sm:text-xs font-mono font-black text-amber-950 uppercase mt-1 tracking-wide">
              READY STOCK • READY TO BUY
            </p>
          </div>
        </div>

        <div class="shrink-0 bg-white/90 border-2 border-black px-2.5 py-1.5 rounded-xl shadow-brutal-sm font-mono text-center">
          <div class="text-[9px] text-gray-600 font-bold uppercase">STOCK</div>
          <div class="text-xs sm:text-sm font-black text-brand-dark">VERIFIED</div>
        </div>

      </div>

      <!-- Shop Subtitle Copy -->
      <div class="bg-white border-2 border-black px-3.5 py-2 rounded-xl shadow-brutal-sm font-mono text-xs font-bold text-gray-800 flex items-center justify-between gap-2">
        <span class="flex items-center gap-1.5">
          <span>🛡️</span>
          <span>"Item COC yang lagi ready. Pilih, klik, order."</span>
        </span>
        <span class="text-brand-orange text-[11px] font-black shrink-0">100% LEGAL & AMAN</span>
      </div>

      <!-- ⭐ FEATURED ITEM (Single Instance) -->
      <div id="featuredItemContainer">
        <!-- Rendered dynamically from products array -->
      </div>

      <!-- 7. PRODUCT GRID & FILTERS (Single Instance) -->
      <div class="pt-0.5">
        <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar py-1">
          <span class="text-[10px] font-mono font-black uppercase text-gray-500 shrink-0">FILTER:</span>
          
          <button onclick="filterProducts('ALL')" 
                  class="filter-btn active-filter bg-black text-white px-3 py-1 rounded-xl border-2 border-black font-mono text-[11px] font-black shadow-brutal-sm shrink-0 transition" 
                  data-filter="ALL">
            ALL LOOT
          </button>
          
          <button onclick="filterProducts('LEGENDARY')" 
                  class="filter-btn bg-white hover:bg-yellow-100 text-black px-3 py-1 rounded-xl border-2 border-black font-mono text-[11px] font-black shadow-brutal-sm shrink-0 transition" 
                  data-filter="LEGENDARY">
            👑 LEGENDARY
          </button>

          <button onclick="filterProducts('EPIC')" 
                  class="filter-btn bg-white hover:bg-purple-100 text-black px-3 py-1 rounded-xl border-2 border-black font-mono text-[11px] font-black shadow-brutal-sm shrink-0 transition" 
                  data-filter="EPIC">
            🟣 EPIC
          </button>

          <button onclick="filterProducts('RARE')" 
                  class="filter-btn bg-white hover:bg-cyan-100 text-black px-3 py-1 rounded-xl border-2 border-black font-mono text-[11px] font-black shadow-brutal-sm shrink-0 transition" 
                  data-filter="RARE">
            🔷 RARE
          </button>

          <button onclick="filterProducts('READY')" 
                  class="filter-btn bg-white hover:bg-green-100 text-black px-3 py-1 rounded-xl border-2 border-black font-mono text-[11px] font-black shadow-brutal-sm shrink-0 transition" 
                  data-filter="READY">
            🟢 READY STOCK
          </button>
        </div>
      </div>

      <!-- 2-COLUMN MOBILE PRODUCT GRID -->
      <div id="productGrid" class="grid grid-cols-2 gap-2.5 sm:gap-3.5 pt-0.5">
        <!-- Rendered dynamically from products array -->
      </div>

      <!-- Empty Filter Notice -->
      <div id="emptyFilterNotice" class="hidden bg-white border-3 border-black p-5 rounded-2xl text-center shadow-brutal font-mono">
        <div class="text-2xl mb-1">📦</div>
        <div class="font-black text-xs sm:text-sm">Tidak ada item di kategori ini saat ini.</div>
        <button onclick="filterProducts('ALL')" class="mt-2.5 bg-brand-yellow text-black border-2 border-black px-3 py-1 rounded-lg font-black text-xs shadow-brutal-sm">
          Reset Filter ➔
        </button>
      </div>

    </section>

    <!-- ============================================================== -->
    <!-- 5. ⚔️ JASA JOKI COC (Featuring BARBARIAN KING Fan-Art)          -->
    <!-- ============================================================== -->
    <section id="jasaJokiSection" class="space-y-3.5 pt-2">
      
      <!-- Joki Header with BARBARIAN KING Original Fan-Art Mascot -->
      <div class="bg-gradient-to-r from-orange-500 via-amber-500 to-yellow-400 border-3 sm:border-4 border-black p-4 sm:p-5 rounded-3xl shadow-brutal-lg relative overflow-hidden">
        
        <!-- Left: Headline, Subtitle, Guarantees -->
        <div class="flex items-end justify-between gap-2 sm:gap-4 relative z-10">
          
          <div class="max-w-[58%] sm:max-w-[62%] flex flex-col justify-between">
            <div>
              <div class="inline-flex items-center gap-1.5 bg-black text-brand-yellow px-2 py-0.5 rounded text-[10px] sm:text-[11px] font-mono font-black mb-1.5 shadow-brutal-sm">
                <span>🛡️</span>
                <span>CHIEFTAIN SERVICE</span>
              </div>

              <h2 class="text-xl sm:text-2xl md:text-3xl font-black uppercase tracking-tight text-white leading-none drop-shadow-[2px_2px_0px_#121212]">
                ⚔️ JASA JOKI COC
              </h2>

              <p class="mt-2 text-xs sm:text-sm font-extrabold text-amber-950 leading-snug">
                Pusing push rank atau capek mentokin tembok? Serahkan ke markas BebanKlan! 100% manual attack.
              </p>
            </div>

            <div class="mt-3">
              <button onclick="handleJokiOrder('Joki Konsultasi', 'Fast Track')" 
                      class="inline-flex items-center gap-1.5 bg-black hover:bg-neutral-900 text-brand-yellow font-mono font-black text-xs sm:text-sm px-4 py-2 sm:px-5 sm:py-2.5 rounded-xl border-2 border-black shadow-brutal transition active:scale-95">
                <span>BOOKING JOKI →</span>
              </button>
            </div>
          </div>

          <!-- Right: BARBARIAN KING ORIGINAL FAN-ART SVG -->
          <div class="shrink-0 w-36 sm:w-44 md:w-48 flex flex-col items-center justify-end relative pointer-events-auto mascot-interactive animate-king" 
               onclick="triggerMascotCheer('king')"
               title="Barbarian King Fan-Art Mascot! Tap to roar!">
            
            <!-- Comic Speech Bubble -->
            <div class="mb-1 bg-white border-2 border-black rounded-xl px-2 py-1 shadow-brutal-sm text-[9px] sm:text-[10px] font-mono font-black text-amber-950 whitespace-nowrap animate-bubble-pulse relative">
              <span>"JOKI? GAS TEBAS! ⚔️"</span>
              <div class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-2 h-2 bg-white border-b-2 border-r-2 border-black rotate-45"></div>
            </div>

            <!-- BARBARIAN KING ORIGINAL FAN-ART SVG -->
            <svg class="w-32 sm:w-40 md:w-44 h-auto overflow-visible select-none drop-shadow-[4px_4px_0px_#121212]" viewBox="0 0 170 200" fill="none" xmlns="http://www.w3.org/2000/svg">
              <!-- Battle Rage Backdrop -->
              <circle cx="85" cy="105" r="58" fill="#EA580C" fill-opacity="0.3" stroke="#121212" stroke-width="3" stroke-dasharray="4 4" />

              <!-- Colossal Chipped Iron Greatsword on Shoulder -->
              <g id="king-greatsword">
                <polygon points="105,15 155,5 145,95 112,105" fill="#94A3B8" stroke="#121212" stroke-width="4.5" stroke-linejoin="round" />
                <polygon points="115,22 148,14 140,88 120,95" fill="#CBD5E1" />
                <!-- Battle Chips on Blade Edge -->
                <polygon points="144,38 140,46 147,48" fill="#121212" />
                <polygon points="141,68 136,75 143,78" fill="#121212" />
                <!-- Glowing Energy Rune Line -->
                <line x1="126" y1="22" x2="124" y2="85" stroke="#FF5400" stroke-width="3" stroke-linecap="round" />
                <!-- Crossguard & Spikes -->
                <rect x="100" y="98" width="38" height="12" rx="3" fill="#F59E0B" stroke="#121212" stroke-width="3.5" />
                <polygon points="106,98 110,88 116,98" fill="#121212" />
                <polygon points="122,98 126,88 132,98" fill="#121212" />
                <!-- Leather Wrapped Hilt & Pommel -->
                <line x1="118" y1="110" x2="116" y2="135" stroke="#78350F" stroke-width="9" stroke-linecap="round" />
                <circle cx="115" cy="138" r="6" fill="#FBBF24" stroke="#121212" stroke-width="2.5" />
              </g>

              <!-- Heavy Spiked Left Iron Pauldron -->
              <g id="king-iron-pauldron">
                <path d="M22 96 C22 75 48 70 56 92 C52 110 28 116 22 96 Z" fill="#475569" stroke="#121212" stroke-width="4" />
                <!-- Pauldron Spikes -->
                <polygon points="26,80 30,66 38,80" fill="#E2E8F0" stroke="#121212" stroke-width="2.5" />
                <polygon points="40,80 46,66 52,80" fill="#E2E8F0" stroke="#121212" stroke-width="2.5" />
                <circle cx="38" cy="94" r="4" fill="#FBBF24" stroke="#121212" stroke-width="1.8" />
              </g>

              <!-- Muscular Torso & Leather Studded Harness -->
              <path d="M46 95 C44 140 48 175 45 195 C70 198 100 198 122 195 C119 175 124 140 120 95 Z" fill="#EA580C" stroke="#121212" stroke-width="4.5" />
              <!-- Barbarian Leather X-Straps with Gold Studs -->
              <line x1="50" y1="98" x2="116" y2="175" stroke="#121212" stroke-width="7" />
              <line x1="50" y1="98" x2="116" y2="175" stroke="#FBBF24" stroke-width="3.5" />
              <line x1="116" y1="98" x2="50" y2="175" stroke="#121212" stroke-width="7" />
              <line x1="116" y1="98" x2="50" y2="175" stroke="#FBBF24" stroke-width="3.5" />
              <circle cx="83" cy="138" r="7" fill="#121212" />
              <circle cx="83" cy="138" r="4" fill="#FFDF00" />

              <!-- Massive Iron Gauntlet on Right Hand -->
              <rect x="110" y="115" width="22" height="28" rx="6" fill="#334155" stroke="#121212" stroke-width="3.5" />
              <circle cx="121" cy="125" r="3" fill="#FBBF24" />

              <!-- Barbarian King Head, Wild Hair & Beard -->
              <path d="M58 65 C58 45 108 45 108 65 C108 85 98 94 83 96 C68 94 58 85 58 65 Z" fill="#FDE047" stroke="#121212" stroke-width="4" />
              
              <!-- Iconic Golden Blond Beard & Mustache -->
              <path d="M50 78 C46 112 62 135 84 138 C106 135 120 112 116 78 C110 90 98 98 83 100 C68 98 56 90 50 78 Z" fill="#F59E0B" stroke="#121212" stroke-width="4" />
              <polygon points="70,115 84,136 78,115" fill="#D97706" />
              <polygon points="88,115 84,136 98,115" fill="#D97706" />

              <!-- Barbarian Heroic Fierce Face -->
              <path d="M64 62 L77 67" stroke="#121212" stroke-width="4" stroke-linecap="round" />
              <circle cx="71" cy="72" r="2.5" fill="#121212" />
              <path d="M102 62 L89 67" stroke="#121212" stroke-width="4" stroke-linecap="round" />
              <circle cx="95" cy="72" r="2.5" fill="#121212" />
              <!-- Brow Scar -->
              <line x1="67" y1="56" x2="73" y2="76" stroke="#EF4444" stroke-width="2.5" stroke-linecap="round" />
              <!-- Confident Warrior Grin with White Teeth -->
              <path d="M72 84 Q83 94 94 84 Z" fill="#FFFFFF" stroke="#121212" stroke-width="3" />
              <line x1="80" y1="85" x2="80" y2="89" stroke="#121212" stroke-width="2" />
              <line x1="86" y1="85" x2="86" y2="89" stroke="#121212" stroke-width="2" />

              <!-- Wild Spiky Golden Hair Silhouette -->
              <path d="M54 55 C48 34 66 24 83 28 C98 24 116 34 112 55 Z" fill="#FBBF24" stroke="#121212" stroke-width="4" />

              <!-- Iconic Iron Chieftain Crown with Central Red Ruby -->
              <polygon points="52,44 58,20 74,36 83,16 92,36 106,20 114,44 106,50 83,46 60,50" fill="#FBBF24" stroke="#121212" stroke-width="3.5" />
              <polygon points="79,32 83,22 87,32 83,38" fill="#EF4444" stroke="#121212" stroke-width="2" />
              <circle cx="83" cy="30" r="2" fill="#FFFFFF" />
            </svg>
          </div>

        </div>

      </div>

      <!-- Joki Offerings Grid: Joki Wall, Joki Rank, Joki CWL -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
        
        <!-- Service Card 1: Joki Wall -->
        <div class="bg-white border-3 border-black p-3 sm:p-3.5 rounded-2xl shadow-brutal flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between gap-1 mb-1.5">
              <span class="bg-amber-100 border border-black text-amber-900 text-[9px] font-mono font-black px-2 py-0.5 rounded">
                🧱 WALL MAX
              </span>
              <span class="text-[10px] font-mono font-bold text-brand-green">🟢 FAST RUN</span>
            </div>
            <h4 class="font-black text-sm text-black uppercase">JOKI WALL UPGRADE BORONGAN</h4>
            <p class="text-[11px] text-gray-700 font-semibold mt-1 leading-snug">
              Biar builder gak nganggur dan loot gak mubazir. Upgrade tembok borongan TH12–TH16 anti-capek.
            </p>
          </div>

          <div class="mt-3 pt-2 border-t border-black/15 flex items-center justify-between">
            <div class="font-mono text-xs font-black text-black">Mulai Rp 30.000</div>
            <button onclick="handleJokiOrder('Joki Wall Upgrade', 'Rp 30.000+')" 
                    class="bg-brand-yellow hover:bg-yellow-400 text-black font-mono font-black text-[11px] px-3 py-1 rounded-xl border-2 border-black shadow-brutal-sm active:translate-y-0.5 transition">
              ORDER WALL →
            </button>
          </div>
        </div>

        <!-- Service Card 2: Joki Rank & Trophy -->
        <div class="bg-white border-3 border-black p-3 sm:p-3.5 rounded-2xl shadow-brutal flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between gap-1 mb-1.5">
              <span class="bg-purple-100 border border-black text-purple-900 text-[9px] font-mono font-black px-2 py-0.5 rounded">
                🏆 TROPHY PUSH
              </span>
              <span class="text-[10px] font-mono font-bold text-brand-green">🟢 LEGEND READY</span>
            </div>
            <h4 class="font-black text-sm text-black uppercase">JOKI RANK & TROPHY PUSH</h4>
            <p class="text-[11px] text-gray-700 font-semibold mt-1 leading-snug">
              Push rank Champion, Titan, sampai Legend League 5000+ Trophy. Combo attack pro meta 3-Star.
            </p>
          </div>

          <div class="mt-3 pt-2 border-t border-black/15 flex items-center justify-between">
            <div class="font-mono text-xs font-black text-black">Mulai Rp 50.000</div>
            <button onclick="handleJokiOrder('Joki Rank Push', 'Rp 50.000+')" 
                    class="bg-brand-yellow hover:bg-yellow-400 text-black font-mono font-black text-[11px] px-3 py-1 rounded-xl border-2 border-black shadow-brutal-sm active:translate-y-0.5 transition">
              PUSH RANK →
            </button>
          </div>
        </div>

      </div>

      <!-- Joki Trust Strip -->
      <div class="bg-neutral-900 text-white border-2 border-black p-2.5 rounded-xl font-mono text-[10px] sm:text-[11px] flex flex-wrap items-center justify-around gap-2 shadow-brutal-sm">
        <span class="flex items-center gap-1 text-brand-yellow"><span>🛡️</span> 100% Manual Attack</span>
        <span class="flex items-center gap-1 text-brand-green"><span>🔒</span> Anti Banned Supercell</span>
        <span class="flex items-center gap-1 text-brand-cyan"><span>📺</span> Live Screen Share Discord</span>
      </div>

    </section>

    <!-- ============================================================== -->
    <!-- 6. FOLLOW THE KLAN (Single Instance)                           -->
    <!-- ============================================================== -->
    <section class="space-y-2.5 pt-1">
      <div class="flex items-center justify-between">
        <h3 class="text-xs sm:text-sm font-mono font-black uppercase tracking-wider text-gray-800 flex items-center gap-1.5">
          <span>🏰</span>
          <span>FOLLOW THE KLAN</span>
        </h3>
        <span class="text-[10px] font-mono text-gray-500 font-bold">COMMUNITY BASE</span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
        
        <!-- YouTube -->
        <a id="linkYoutube" href="#" target="_blank" rel="noopener noreferrer" 
           class="group bg-white hover:bg-red-50 border-3 border-black p-2.5 rounded-xl shadow-brutal transition transform hover:-translate-y-0.5 active:translate-y-0.5 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-red-600 text-white rounded-lg border-2 border-black flex items-center justify-center font-black shadow-brutal-sm text-xs shrink-0">
              ▶
            </div>
            <div>
              <div class="font-black text-xs text-black group-hover:text-red-600 transition">YouTube Channel</div>
              <div class="text-[10px] font-mono text-gray-500">Live Clan War & Klipper Chaos</div>
            </div>
          </div>
          <span class="font-mono text-xs font-black text-black group-hover:translate-x-1 transition-transform">→</span>
        </a>

        <!-- TikTok -->
        <a id="linkTiktok" href="https://www.tiktok.com/@clashofclansbebanklan" target="_blank" rel="noopener noreferrer" 
           class="group bg-white hover:bg-neutral-100 border-3 border-black p-2.5 rounded-xl shadow-brutal transition transform hover:-translate-y-0.5 active:translate-y-0.5 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-black text-white rounded-lg border-2 border-black flex items-center justify-center font-black shadow-brutal-sm text-xs shrink-0">
              ♫
            </div>
            <div>
              <div class="font-black text-xs text-black">TikTok Highlights</div>
              <div class="text-[10px] font-mono text-gray-500">Fast 3-Star attacks & loot clips</div>
            </div>
          </div>
          <span class="font-mono text-xs font-black text-black group-hover:translate-x-1 transition-transform">→</span>
        </a>

        <!-- Instagram -->
        <a id="linkInstagram" href="#" target="_blank" rel="noopener noreferrer" 
           class="group bg-white hover:bg-pink-50 border-3 border-black p-2.5 rounded-xl shadow-brutal transition transform hover:-translate-y-0.5 active:translate-y-0.5 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-brand-pink text-white rounded-lg border-2 border-black flex items-center justify-center font-black shadow-brutal-sm text-xs shrink-0">
              📸
            </div>
            <div>
              <div class="font-black text-xs text-black group-hover:text-brand-pink transition">Instagram Stories</div>
              <div class="text-[10px] font-mono text-gray-500">Restock info & daily updates</div>
            </div>
          </div>
          <span class="font-mono text-xs font-black text-black group-hover:translate-x-1 transition-transform">→</span>
        </a>

        <!-- Discord -->
        <a id="linkDiscord" href="#" target="_blank" rel="noopener noreferrer" 
           class="group bg-white hover:bg-indigo-50 border-3 border-black p-2.5 rounded-xl shadow-brutal transition transform hover:-translate-y-0.5 active:translate-y-0.5 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-indigo-600 text-white rounded-lg border-2 border-black flex items-center justify-center font-black shadow-brutal-sm text-xs shrink-0">
              👾
            </div>
            <div>
              <div class="font-black text-xs text-black group-hover:text-indigo-600 transition">Discord Markas Klan</div>
              <div class="text-[10px] font-mono text-gray-500">War room & item orders</div>
            </div>
          </div>
          <span class="font-mono text-xs font-black text-black group-hover:translate-x-1 transition-transform">→</span>
        </a>

        <!-- GitHub -->
        <a id="linkGithub" href="#" target="_blank" rel="noopener noreferrer" 
           class="group bg-white hover:bg-green-50 border-3 border-black p-2.5 rounded-xl shadow-brutal transition transform hover:-translate-y-0.5 active:translate-y-0.5 flex items-center justify-between sm:col-span-2">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-brand-green text-black rounded-lg border-2 border-black flex items-center justify-center font-black shadow-brutal-sm text-xs shrink-0">
              ⌨
            </div>
            <div>
              <div class="font-black text-xs text-black group-hover:text-green-700 transition">GitHub Klipper Macros</div>
              <div class="text-[10px] font-mono text-gray-500">Open source printer.cfg & tuning files</div>
            </div>
          </div>
          <span class="font-mono text-xs font-black text-black group-hover:translate-x-1 transition-transform">→</span>
        </a>

      </div>
    </section>

    <!-- ============================================================== -->
    <!-- 7. FOOTER (Single Instance)                                    -->
    <!-- ============================================================== -->
    <footer class="pt-5 pb-6 border-t-3 border-black text-center font-mono space-y-2.5">
      <div class="inline-block bg-brand-yellow hover:bg-yellow-300 border-2 border-black px-3 py-1.5 rounded-xl text-[11px] font-black shadow-brutal-sm cursor-pointer transition active:translate-y-0.5" onclick="openDonateModal()">
        ☕ Traktir kopi leader biar printer & clan war terus jalan!
      </div>

      <div class="text-xs text-gray-800 font-extrabold">
        CLASHOFCLANBEBANKLAN © 2026 • CREATOR & COC ITEM HUB
      </div>
      <div class="text-[10px] text-gray-500 max-w-sm mx-auto leading-tight">
        Website pribadi creator. Terinspirasi dari budaya game strategi fantasy & 3D printing. Bukan website resmi Supercell.
      </div>
    </footer>

  </main>

  <!-- ============================================================== -->
  <!-- MOBILE STICKY ACTION BAR (Single Instance)                     -->
  <!-- ☕ SUPPORT = 60% Width (Dominates) | 🤖 AI KLIPPER = 40% Width -->
  <!-- ============================================================== -->
  <div id="stickyBottomBar" 
       class="fixed bottom-0 left-0 right-0 z-40 transform translate-y-full transition-transform duration-300 ease-in-out px-3 pt-2 safe-bar-offset bg-white/95 backdrop-blur border-t-4 border-black shadow-[0px_-4px_12px_rgba(0,0,0,0.18)] md:hidden">
    
    <div class="max-w-xl mx-auto flex items-center gap-2">
      
      <!-- ☕ SUPPORT (#1 Hero - 60% Width) -->
      <button onclick="openDonateModal()" 
              class="w-[60%] flex items-center justify-center gap-1.5 bg-brand-yellow hover:bg-yellow-400 active:scale-95 text-black font-mono font-black text-xs sm:text-sm py-3 px-2 rounded-xl border-3 border-black shadow-brutal transition-all">
        <span class="text-base animate-bounce">☕</span>
        <span class="tracking-tight">SUPPORT</span>
        <span class="text-[10px] bg-black text-brand-yellow px-1.5 py-0.5 rounded ml-0.5 font-extrabold">#1</span>
      </button>

      <!-- 🤖 AI KLIPPER (#2 Affiliate - 40% Width) -->
      <button onclick="openAiAffiliate()" 
              class="w-[40%] flex items-center justify-center gap-1.5 bg-cyan-100 hover:bg-cyan-200 active:scale-95 text-black font-mono font-black text-xs py-3 px-2 rounded-xl border-3 border-black shadow-brutal-sm transition-all">
        <span class="text-sm">🤖</span>
        <span class="tracking-tight">AI KLIPPER</span>
        <span class="text-[10px] font-extrabold text-gray-700">→</span>
      </button>

    </div>
  </div>

  <!-- ============================================================== -->
  <!-- MODAL: DONATE / SUPPORT (Single Instance)                       -->
  <!-- ============================================================== -->
  <div id="donateModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/65 backdrop-blur-sm transition-opacity">
    <div class="bg-brand-yellow border-4 border-black rounded-3xl p-5 sm:p-7 max-w-md w-full shadow-brutal-hero relative max-h-[90vh] overflow-y-auto">
      
      <button onclick="closeDonateModal()" class="absolute top-4 right-4 bg-black text-white w-8 h-8 rounded-xl border-2 border-black font-mono font-black text-base flex items-center justify-center hover:bg-neutral-800 shadow-brutal-sm active:translate-x-0.5 active:translate-y-0.5">
        ✕
      </button>

      <div class="flex items-center gap-3 mb-3">
        <div class="w-11 h-11 bg-black text-brand-yellow rounded-2xl flex items-center justify-center text-xl border-2 border-black shadow-brutal-sm">
          ☕
        </div>
        <div>
          <span class="text-[9px] font-mono font-black uppercase bg-black text-white px-2 py-0.5 rounded">SUPPORT CREATOR</span>
          <h3 class="text-xl sm:text-2xl font-black uppercase tracking-tight text-black leading-none mt-1">TRAKTIR KOPI BEBAN</h3>
        </div>
      </div>

      <p class="text-xs font-extrabold text-gray-900 mb-4 leading-snug">
        Pilih platform favoritmu buat dukung creator beli filament baru, riset Klipper, & terus aktif di Clan War:
      </p>

      <div class="space-y-2 font-mono text-xs font-extrabold">
        <!-- Saweria -->
        <a id="donateSaweriaBtn" href="#" target="_blank" rel="noopener noreferrer" 
           class="flex items-center justify-between p-2.5 bg-white hover:bg-orange-50 border-3 border-black rounded-xl shadow-brutal hover:shadow-brutal-lg transition active:translate-y-0.5">
          <div class="flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-yellow-400 border border-black flex items-center justify-center text-xs font-black">S</span>
            <div class="text-left">
              <div class="text-black font-black">Saweria (QRIS / E-Wallet)</div>
              <div class="text-[10px] text-gray-500 font-semibold">Instan GoPay, OVO, Dana, ShopeePay</div>
            </div>
          </div>
          <span class="bg-black text-brand-yellow px-2 py-1 rounded text-[10px]">PAY ➔</span>
        </a>

        <!-- Trakteer -->
        <a id="donateTrakteerBtn" href="#" target="_blank" rel="noopener noreferrer" 
           class="flex items-center justify-between p-2.5 bg-white hover:bg-red-50 border-3 border-black rounded-xl shadow-brutal hover:shadow-brutal-lg transition active:translate-y-0.5">
          <div class="flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-red-500 text-white border border-black flex items-center justify-center text-xs font-black">T</span>
            <div class="text-left">
              <div class="text-black font-black">Trakteer (Kopi & Karya)</div>
              <div class="text-[10px] text-gray-500 font-semibold">Dukung unit kopi & konten kreator</div>
            </div>
          </div>
          <span class="bg-black text-brand-yellow px-2 py-1 rounded text-[10px]">PAY ➔</span>
        </a>

        <!-- Ko-fi / PayPal -->
        <a id="donateKofiBtn" href="#" target="_blank" rel="noopener noreferrer" 
           class="flex items-center justify-between p-2.5 bg-white hover:bg-cyan-50 border-3 border-black rounded-xl shadow-brutal hover:shadow-brutal-lg transition active:translate-y-0.5">
          <div class="flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-cyan-400 border border-black flex items-center justify-center text-xs font-black">☕</span>
            <div class="text-left">
              <div class="text-black font-black">Ko-fi / PayPal (USD)</div>
              <div class="text-[10px] text-gray-500 font-semibold">International creator support</div>
            </div>
          </div>
          <span class="bg-black text-brand-yellow px-2 py-1 rounded text-[10px]">PAY ➔</span>
        </a>

        <!-- Direct Account Copy -->
        <div class="p-2.5 bg-white border-3 border-black rounded-xl shadow-brutal flex items-center justify-between">
          <div>
            <div class="text-black font-black">BCA / QRIS Key</div>
            <div class="text-[10px] text-gray-600 font-semibold font-mono">BEBAN-KLIPPER-8899</div>
          </div>
          <button onclick="copyToClipboard('BEBAN-KLIPPER-8899', 'Kode Akun')" class="bg-brand-green text-black border-2 border-black px-2.5 py-1 rounded text-[10px] font-bold shadow-brutal-sm hover:bg-green-400 active:translate-y-0.5">
            COPY 📋
          </button>
        </div>
      </div>

      <div class="mt-3 text-center font-mono text-[10px] text-black font-black">
        ❤️ Dukungan kalian bikin markas Bebanklan tetap menyala!
      </div>
    </div>
  </div>

  <!-- MODAL: PRODUCT ORDER / BUY DIALOGUE (Single Instance) -->
  <div id="orderModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/65 backdrop-blur-sm transition-opacity">
    <div class="bg-white border-4 border-black rounded-3xl p-5 sm:p-7 max-w-md w-full shadow-brutal-hero relative max-h-[90vh] overflow-y-auto">
      
      <button onclick="closeOrderModal()" class="absolute top-4 right-4 bg-black text-white w-8 h-8 rounded-xl border-2 border-black font-mono font-black text-base flex items-center justify-center hover:bg-neutral-800 shadow-brutal-sm">
        ✕
      </button>

      <div class="flex items-center gap-1.5 mb-2">
        <span id="orderModalRarity" class="px-2 py-0.5 rounded border border-black text-[10px] font-mono font-black">
          RARITY
        </span>
        <span class="text-[10px] font-mono font-black bg-brand-green text-black px-2 py-0.5 rounded border border-black">
          🟢 READY STOCK
        </span>
      </div>

      <h3 id="orderModalTitle" class="text-xl sm:text-2xl font-black uppercase tracking-tight text-black leading-tight">
        COC ITEM NAME
      </h3>
      
      <p id="orderModalDesc" class="text-xs text-gray-600 font-medium mt-1 mb-3 leading-relaxed">
        Description
      </p>

      <div class="bg-amber-50 border-3 border-black rounded-2xl p-3 mb-3.5 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
          <div id="orderModalImageContainer" class="w-12 h-12 bg-amber-200 border-2 border-black rounded-xl flex items-center justify-center overflow-hidden">
            <!-- Icon preview inserted here -->
          </div>
          <div>
            <div class="text-[9px] font-mono font-bold text-gray-500 uppercase">HARGA LOOT:</div>
            <div id="orderModalPrice" class="text-lg font-black text-brand-dark">Rp 0</div>
          </div>
        </div>
        <div class="text-right font-mono text-[9px] text-gray-500">
          Proses cepat via<br>WhatsApp / Discord
        </div>
      </div>

      <div class="space-y-2 font-mono text-xs font-black">
        <button onclick="completeOrderVia('WhatsApp')" 
                class="w-full bg-[#25D366] hover:bg-emerald-500 text-black border-3 border-black p-2.5 rounded-xl shadow-brutal flex items-center justify-between transition active:translate-y-0.5">
          <span class="flex items-center gap-1.5">
            <span>💬</span> ORDER VIA WHATSAPP (FAST)
          </span>
          <span>➔</span>
        </button>

        <button onclick="completeOrderVia('Discord')" 
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white border-3 border-black p-2.5 rounded-xl shadow-brutal flex items-center justify-between transition active:translate-y-0.5">
          <span class="flex items-center gap-1.5">
            <span>👾</span> ORDER VIA DISCORD TICKET
          </span>
          <span>➔</span>
        </button>

        <button onclick="copyOrderFormat()" 
                class="w-full bg-brand-yellow hover:bg-yellow-400 text-black border-2 border-black p-2 rounded-xl shadow-brutal-sm flex items-center justify-center gap-1.5 transition active:translate-y-0.5">
          <span>📋</span> SALIN FORMAT ORDER KE CLIPBOARD
        </button>
      </div>

      <div class="mt-3 text-center font-mono text-[10px] text-gray-500">
        🛡️ 100% Bergaransi Leader BebanKlan • Pembayaran BCA, GoPay, OVO, Dana, QRIS.
      </div>

    </div>
  </div>

  <!-- Toast Notification Container -->
  <div id="toastContainer" class="fixed top-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

  <script>
    /* ============================================================== */
    /* CENTRALIZED URLS & APP CONFIGURATION                           */
    /* ============================================================== */
    const APP_CONFIG = {
      creatorName: "CLASHOFCLANBEBANKLAN",
      // Konfigurasi akun TikTok yang ditampilkan di Header Card
      tiktok: {
        username: "@clashofclansbebanklan",
        displayName: "CLASHOFCLANBEBANKLAN",
        profileUrl: "https://www.tiktok.com/@clashofclansbebanklan",
        avatarUrl: "image_a0840b.png", // Foto profil asli Barbarian Beban Klan
        bio: "Ngoprek Klipper, bikin printer makin kencang, dan sesekali bikin masalah baru buat diselesaikan.",
        stats: {
          following: "142",      // Sesuaikan jumlah mengikuti profil Anda
          followers: "28.4K",    // Sesuaikan jumlah pengikut profil Anda
          likes: "185.9K"        // Sesuaikan jumlah suka profil Anda
        }
      },
      urls: {
        donateSaweria: "https://saweria.co/placeholder-bebanklan",
        donateTrakteer: "https://trakteer.id/placeholder-bebanklan",
        donateKofi: "https://ko-fi.com/placeholder-bebanklan",
        aiKlipperAffiliate: "https://ai-klipper-tool.placeholder/aff?ref=bebanklan",
        whatsappNumber: "6281234567890",
        discordInvite: "https://discord.gg/placeholder-bebanklan",
        socials: {
          youtube: "https://youtube.com/@placeholder-bebanklan",
          tiktok: "https://www.tiktok.com/@clashofclansbebanklan",
          instagram: "https://instagram.com/placeholder-bebanklan",
          discord: "https://discord.gg/placeholder-bebanklan",
          github: "https://github.com/placeholder-bebanklan"
        }
      }
    };

    /* ============================================================== */
    /* CENTRALIZED PRODUCT DATA ARRAY                                 */
    /* ============================================================== */
    const products = [
      {
        id: 1,
        name: "GEMS POUCH 2,500 💎",
        description: "Paket Gems legal resmi Supercell ID, cocok buat upgrade builder hut & hero speedrun.",
        price: "Rp 145.000",
        rarity: "EPIC",
        status: "READY STOCK",
        featured: false,
        iconType: "gem-pouch"
      },
      {
        id: 2,
        name: "GOLD PASS SEASON 🏆",
        description: "Aktivasi Gold Pass instan. Buka skin hero eksklusif, 20% builder boost, & 1-Gem donation.",
        price: "Rp 89.000",
        rarity: "LEGENDARY",
        status: "READY STOCK",
        featured: true, // Featured item
        iconType: "gold-pass"
      },
      {
        id: 3,
        name: "DARK ELIXIR BARREL 🟣",
        description: "Supply botol Dark Elixir buat leveling Queen & King anti-mentok saat Clan War League.",
        price: "Rp 65.000",
        rarity: "RARE",
        status: "READY STOCK",
        featured: false,
        iconType: "dark-elixir"
      },
      {
        id: 4,
        name: "CLAN CASTLE WAR PACK ⚔️",
        description: "Bundling Spell + Max Siege Machine priority donation pass untuk 1 musim War.",
        price: "Rp 45.000",
        rarity: "SPECIAL",
        status: "READY STOCK",
        featured: false,
        iconType: "clan-shield"
      },
      {
        id: 5,
        name: "HERO POTION BUNDLE 🧪",
        description: "5x Botol Hero Potion instan +5 Level saat attack war. Sangat krusial buat 3-Star!",
        price: "Rp 35.000",
        rarity: "COMMON",
        status: "READY STOCK",
        featured: false,
        iconType: "potion"
      },
      {
        id: 6,
        name: "TH16 MAX BASE PACK 🏰",
        description: "Full base layout anti 3-star CWL rancangan pro builder klan + test attack coaching.",
        price: "Rp 120.000",
        rarity: "EPIC",
        status: "SOLD OUT",
        featured: false,
        iconType: "castle-blueprint"
      }
    ];

    let currentFilter = 'ALL';
    let selectedProduct = null;

    function getFantasyIconSvg(type) {
      switch (type) {
        case 'gem-pouch':
          return `
            <svg class="w-14 h-14 sm:w-16 sm:h-16 transform transition group-hover:scale-110" viewBox="0 0 100 100" fill="none" stroke="#121212" stroke-width="4">
              <path d="M30 38 C30 20 70 20 70 38 C85 45 88 80 75 88 C60 94 40 94 25 88 C12 80 15 45 30 38 Z" fill="#D97706" />
              <ellipse cx="50" cy="38" rx="20" ry="6" fill="#78350F" />
              <polygon points="50,48 68,62 50,84 32,62" fill="#10B981" stroke="#121212" stroke-width="3" />
              <polygon points="50,48 59,62 50,84 41,62" fill="#34D399" />
              <circle cx="50" cy="55" r="2" fill="#FFFFFF" />
            </svg>
          `;
        case 'gold-pass':
          return `
            <svg class="w-18 h-18 sm:w-20 sm:h-20 transform transition group-hover:scale-110" viewBox="0 0 100 100" fill="none" stroke="#121212" stroke-width="4">
              <rect x="20" y="15" width="60" height="72" rx="10" fill="#FBBF24" />
              <path d="M26 21 H74 V70 L50 82 L26 70 Z" fill="#F59E0B" />
              <polygon points="35,52 40,40 50,47 60,40 65,52" fill="#FEF08A" stroke="#121212" stroke-width="3" />
              <polygon points="50,28 53,35 60,35 54,40 56,47 50,42 44,47 46,40 40,35 47,35" fill="#FFFFFF" stroke="#121212" stroke-width="2" />
              <rect x="30" y="60" width="40" height="10" rx="3" fill="#B45309" />
            </svg>
          `;
        case 'dark-elixir':
          return `
            <svg class="w-14 h-14 sm:w-16 sm:h-16 transform transition group-hover:scale-110" viewBox="0 0 100 100" fill="none" stroke="#121212" stroke-width="4">
              <rect x="42" y="16" width="16" height="12" rx="3" fill="#1E1B4B" />
              <path d="M35 28 L65 28 L80 50 L68 85 L32 85 L20 50 Z" fill="#4C1D95" />
              <path d="M26 55 L74 55 L68 83 L32 83 Z" fill="#7C3AED" />
              <circle cx="45" cy="65" r="4" fill="#C4B5FD" />
              <circle cx="58" cy="72" r="3" fill="#DDD6FE" />
            </svg>
          `;
        case 'clan-shield':
          return `
            <svg class="w-14 h-14 sm:w-16 sm:h-16 transform transition group-hover:scale-110" viewBox="0 0 100 100" fill="none" stroke="#121212" stroke-width="4">
              <path d="M50 14 L80 26 C80 60 50 86 50 86 C50 86 20 60 20 26 Z" fill="#EF4444" />
              <path d="M50 14 L50 86 C50 86 20 60 20 26 Z" fill="#DC2626" />
              <line x1="32" y1="36" x2="68" y2="68" stroke="#121212" stroke-width="5" />
              <line x1="68" y1="36" x2="32" y2="68" stroke="#121212" stroke-width="5" />
              <circle cx="50" cy="52" r="7" fill="#FBBF24" stroke="#121212" stroke-width="3" />
            </svg>
          `;
        case 'potion':
          return `
            <svg class="w-14 h-14 sm:w-16 sm:h-16 transform transition group-hover:scale-110" viewBox="0 0 100 100" fill="none" stroke="#121212" stroke-width="4">
              <rect x="44" y="16" width="12" height="14" rx="2" fill="#78350F" />
              <ellipse cx="50" cy="18" rx="8" ry="3" fill="#D97706" />
              <circle cx="50" cy="60" r="28" fill="#0284C7" />
              <path d="M26 65 C30 52 70 52 74 65 C70 82 30 82 26 65 Z" fill="#38BDF8" />
              <polygon points="50,45 52,50 57,52 52,54 50,59 48,54 43,52 48,50" fill="#FFFFFF" />
            </svg>
          `;
        case 'castle-blueprint':
          return `
            <svg class="w-14 h-14 sm:w-16 sm:h-16 transform transition group-hover:scale-110" viewBox="0 0 100 100" fill="none" stroke="#121212" stroke-width="4">
              <rect x="22" y="20" width="56" height="64" rx="6" fill="#2563EB" />
              <rect x="28" y="26" width="44" height="52" fill="#1D4ED8" stroke="#60A5FA" stroke-width="2" stroke-dasharray="3,3" />
              <rect x="34" y="44" width="32" height="28" fill="#93C5FD" stroke="#121212" stroke-width="3" />
              <polygon points="32,44 50,30 68,44" fill="#FBBF24" stroke="#121212" stroke-width="3" />
            </svg>
          `;
        default:
          return `<div class="font-mono font-black text-xl text-black">⚔️</div>`;
      }
    }

    function getRarityBadge(rarity) {
      switch (rarity) {
        case 'LEGENDARY':
          return '<span class="bg-amber-400 text-black border-2 border-black px-1.5 py-0.5 rounded text-[9px] font-mono font-black shadow-brutal-sm">👑 LEGENDARY</span>';
        case 'EPIC':
          return '<span class="bg-purple-600 text-white border-2 border-black px-1.5 py-0.5 rounded text-[9px] font-mono font-black shadow-brutal-sm">🟣 EPIC</span>';
        case 'RARE':
          return '<span class="bg-cyan-400 text-black border-2 border-black px-1.5 py-0.5 rounded text-[9px] font-mono font-black shadow-brutal-sm">🔷 RARE</span>';
        case 'SPECIAL':
          return '<span class="bg-brand-pink text-white border-2 border-black px-1.5 py-0.5 rounded text-[9px] font-mono font-black shadow-brutal-sm">⭐ SPECIAL</span>';
        case 'COMMON':
        default:
          return '<span class="bg-emerald-400 text-black border-2 border-black px-1.5 py-0.5 rounded text-[9px] font-mono font-black shadow-brutal-sm">🟢 COMMON</span>';
      }
    }

    /* ============================================================== */
    /* TOP DONATUR / SULTAN KLAN DATA & LOGIC                         */
    /* ============================================================== */
    const topDonatorsData = {
      monthly: [
        {
          rank: 1,
          name: "Sultan TH16 (Anonim)",
          amount: "Rp 500.000",
          coffee: "100 ☕",
          tier: "👑 CHAMPION LEAGUE",
          avatarBg: "from-amber-400 to-yellow-300",
          badgeBg: "bg-brand-yellow text-black",
          note: "“Biar nozzle 260°C jalan terus & ganti roll PETG baru!”",
          isTop: true
        },
        {
          rank: 2,
          name: "Lord Pekka 99",
          amount: "Rp 250.000",
          coffee: "50 ☕",
          tier: "🥈 TITAN LEAGUE",
          avatarBg: "from-slate-300 to-slate-100",
          badgeBg: "bg-slate-200 text-black",
          note: "“Titip upgrade wall TH15 borongan bang.”",
          isTop: false
        },
        {
          rank: 3,
          name: "Wizard Kafein",
          amount: "Rp 150.000",
          coffee: "30 ☕",
          tier: "🥉 MASTER LEAGUE",
          avatarBg: "from-amber-600 to-amber-300",
          badgeBg: "bg-amber-100 text-amber-950",
          note: "“Sedekah kopi biar gak kena three star pas war!”",
          isTop: false
        },
        {
          rank: 4,
          name: "Barbarian Santuy",
          amount: "Rp 75.000",
          coffee: "15 ☕",
          tier: "⚔️ CRYSTAL",
          badgeBg: "bg-purple-100 text-purple-950",
          note: "“Semangat ngoprek Klipper-nya leader!”",
          isTop: false
        },
        {
          rank: 5,
          name: "Goblin Elixir",
          amount: "Rp 50.000",
          coffee: "10 ☕",
          tier: "🪙 GOLD",
          badgeBg: "bg-yellow-100 text-yellow-900",
          note: "“Uang jajan kopi segelas.”",
          isTop: false
        }
      ],
      allTime: [
        {
          rank: 1,
          name: "Kaisar Filament (Banten)",
          amount: "Rp 1.750.000",
          coffee: "350 ☕",
          tier: "👑 LEGEND SUPREME",
          avatarBg: "from-amber-400 to-yellow-300",
          badgeBg: "bg-brand-yellow text-black",
          note: "“Support total markas BebanKlan sejak era Ender 3!”",
          isTop: true
        },
        {
          rank: 2,
          name: "Sultan TH16 (Anonim)",
          amount: "Rp 1.100.000",
          coffee: "220 ☕",
          tier: "🥈 TITAN SULTAN",
          avatarBg: "from-slate-300 to-slate-100",
          badgeBg: "bg-slate-200 text-black",
          note: "“Bebanklan no counter di war!”",
          isTop: false
        },
        {
          rank: 3,
          name: "HogRider Kece",
          amount: "Rp 650.000",
          coffee: "130 ☕",
          tier: "🥉 MASTER",
          avatarBg: "from-amber-600 to-amber-300",
          badgeBg: "bg-amber-100 text-amber-950",
          note: "“Ganti nozzle pake hardened steel bang.”",
          isTop: false
        },
        {
          rank: 4,
          name: "Lord Pekka 99",
          amount: "Rp 420.000",
          coffee: "84 ☕",
          tier: "⚔️ CRYSTAL",
          badgeBg: "bg-purple-100 text-purple-950",
          note: "“Langganan joki terpercaya.”",
          isTop: false
        },
        {
          rank: 5,
          name: "Archer Queen Worshipper",
          amount: "Rp 250.000",
          coffee: "50 ☕",
          tier: "🪙 GOLD",
          badgeBg: "bg-pink-100 text-pink-900",
          note: "“Buat jajan Mami Queen biar panahnya gak goyang!”",
          isTop: false
        }
      ]
    };

    let currentLeaderboardTab = 'monthly';

    function switchLeaderboardTab(tab) {
      playBeep(480, 'sine', 0.05);
      currentLeaderboardTab = tab;

      const monthlyBtn = document.getElementById('tabMonthlyBtn');
      const allTimeBtn = document.getElementById('tabAllTimeBtn');

      if (tab === 'monthly') {
        monthlyBtn.className = 'bg-black text-white px-2.5 py-1 rounded-lg border border-black transition shadow-brutal-sm';
        allTimeBtn.className = 'bg-transparent text-gray-700 hover:text-black px-2.5 py-1 rounded-lg transition';
      } else {
        allTimeBtn.className = 'bg-black text-white px-2.5 py-1 rounded-lg border border-black transition shadow-brutal-sm';
        monthlyBtn.className = 'bg-transparent text-gray-700 hover:text-black px-2.5 py-1 rounded-lg transition';
      }

      renderLeaderboard();
    }

    function renderLeaderboard() {
      const container = document.getElementById('leaderboardContainer');
      const list = topDonatorsData[currentLeaderboardTab];

      // Rank 1 Crown Hero Card + Stacked List for #2-#5
      const rank1 = list[0];
      const others = list.slice(1);

      container.innerHTML = `
        <!-- RANK #1 SUPREME PODIUM CARD -->
        <div class="bg-gradient-to-br from-amber-100 via-yellow-50 to-amber-200 border-3 sm:border-4 border-black p-3.5 sm:p-4 rounded-2xl shadow-brutal relative overflow-hidden">
          
          <!-- Crown Tag -->
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1.5 bg-black text-brand-yellow font-mono text-[10px] sm:text-[11px] font-black px-2 py-0.5 rounded border border-black shadow-brutal-sm">
              <span class="animate-bounce">👑</span>
              <span>RANK #1 SULTAN TERBARBAR</span>
            </span>
            <span class="text-[9px] font-mono font-black ${rank1.badgeBg} border border-black px-1.5 py-0.5 rounded shadow-brutal-sm">
              ${rank1.tier}
            </span>
          </div>

          <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
              <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br ${rank1.avatarBg} border-3 border-black rounded-xl flex items-center justify-center font-black text-2xl shadow-brutal-sm shrink-0">
                🥇
              </div>
              <div class="min-w-0">
                <div class="font-black text-sm sm:text-base text-black uppercase truncate">
                  ${rank1.name}
                </div>
                <div class="text-[10px] sm:text-[11px] font-mono text-gray-700 italic truncate">
                  ${rank1.note}
                </div>
              </div>
            </div>

            <div class="text-right shrink-0">
              <div class="font-mono text-xs sm:text-sm font-black text-black">
                ${rank1.amount}
              </div>
              <div class="text-[10px] font-mono font-black text-brand-orange bg-amber-200/80 px-1.5 py-0.5 rounded border border-black/30 mt-0.5">
                ${rank1.coffee}
              </div>
            </div>
          </div>
        </div>

        <!-- RANKS #2 TO #5 STACKED TIERS -->
        <div class="grid grid-cols-1 gap-1.5 font-mono">
          ${others.map(item => {
            const medal = item.rank === 2 ? '🥈' : (item.rank === 3 ? '🥉' : `#${item.rank}`);
            return `
              <div class="bg-white hover:bg-yellow-50 border-2 border-black p-2.5 rounded-xl shadow-brutal-sm flex items-center justify-between gap-2 transition">
                <div class="flex items-center gap-2 min-w-0">
                  <div class="w-7 h-7 rounded-lg bg-gray-100 border border-black flex items-center justify-center text-xs font-black shrink-0">
                    ${medal}
                  </div>
                  <div class="min-w-0">
                    <div class="flex items-center gap-1.5 truncate">
                      <span class="font-black text-xs text-black truncate">${item.name}</span>
                      <span class="text-[8px] font-black ${item.badgeBg} px-1 rounded border border-black/40 shrink-0">${item.tier}</span>
                    </div>
                    <div class="text-[9px] text-gray-500 truncate italic">${item.note}</div>
                  </div>
                </div>

                <div class="text-right shrink-0">
                  <div class="text-xs font-black text-black">${item.amount}</div>
                  <div class="text-[9px] text-amber-700 font-bold">${item.coffee}</div>
                </div>
              </div>
            `;
          }).join('')}
        </div>
      `;
    }

    function renderShop() {
      const featuredContainer = document.getElementById('featuredItemContainer');
      const gridContainer = document.getElementById('productGrid');
      const emptyNotice = document.getElementById('emptyFilterNotice');

      const featuredItem = products.find(p => p.featured) || products[0];

      // 1. Render Featured Item Card
      featuredContainer.innerHTML = `
        <div class="product-card bg-gradient-to-br from-amber-100 via-amber-50 to-yellow-100 border-3 sm:border-4 border-black p-4 sm:p-5 rounded-3xl shadow-brutal-lg relative overflow-hidden">
          <div class="flex items-center justify-between gap-2 mb-2.5">
            <div class="inline-flex items-center gap-1 bg-brand-yellow text-black px-2.5 py-0.5 rounded-full border-2 border-black font-mono font-black text-[11px] shadow-brutal-sm">
              <span class="animate-bounce">⭐</span>
              <span>FEATURED ITEM</span>
            </div>
            <div class="flex items-center gap-1">
              ${getRarityBadge(featuredItem.rarity)}
            </div>
          </div>

          <div class="flex flex-col sm:flex-row items-center gap-3.5 sm:gap-5">
            <div class="w-24 h-24 sm:w-28 sm:h-28 bg-amber-300 border-3 border-black rounded-2xl flex items-center justify-center shadow-brutal shrink-0 group">
              <div class="product-img">
                ${getFantasyIconSvg(featuredItem.iconType)}
              </div>
            </div>

            <div class="flex-1 text-center sm:text-left">
              <div class="inline-block bg-brand-green text-black px-2 py-0.5 rounded border border-black text-[10px] font-mono font-black mb-1">
                🟢 ${featuredItem.status}
              </div>
              <h3 class="text-lg sm:text-xl md:text-2xl font-black text-black tracking-tight leading-tight uppercase">
                ${featuredItem.name}
              </h3>
              <p class="text-xs font-semibold text-gray-700 mt-1 leading-snug">
                ${featuredItem.description}
              </p>
              
              <div class="mt-3 flex flex-wrap items-center justify-center sm:justify-between gap-2.5">
                <div class="text-xl sm:text-2xl font-black text-brand-dark font-mono">
                  ${featuredItem.price}
                </div>
                <button onclick="handleProductBuy(${featuredItem.id})" 
                        class="bg-black hover:bg-neutral-800 text-brand-yellow font-mono font-black text-xs sm:text-sm px-5 py-2 sm:px-6 sm:py-2.5 rounded-xl border-2 border-black shadow-brutal flex items-center gap-1.5 transition active:scale-95">
                  <span>BUY NOW →</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      `;

      // 2. Filter Grid Products
      let filtered = products.filter(p => !p.featured);
      if (currentFilter === 'EPIC') {
        filtered = products.filter(p => p.rarity === 'EPIC');
      } else if (currentFilter === 'RARE') {
        filtered = products.filter(p => p.rarity === 'RARE');
      } else if (currentFilter === 'LEGENDARY') {
        filtered = products.filter(p => p.rarity === 'LEGENDARY');
      } else if (currentFilter === 'READY') {
        filtered = products.filter(p => p.status === 'READY STOCK');
      }

      if (filtered.length === 0) {
        gridContainer.innerHTML = '';
        emptyNotice.classList.remove('hidden');
        return;
      } else {
        emptyNotice.classList.add('hidden');
      }

      // 3. Render 2-Column Mobile Product Grid
      gridContainer.innerHTML = filtered.map(item => {
        const isSoldOut = item.status === 'SOLD OUT';
        return `
          <div class="product-card bg-white border-3 border-black p-2.5 sm:p-3 rounded-2xl shadow-brutal flex flex-col justify-between relative group ${isSoldOut ? 'opacity-70' : ''}">
            
            <div>
              <div class="flex items-center justify-between gap-1 mb-1.5">
                ${getRarityBadge(item.rarity)}
                <span class="text-[9px] font-mono font-black ${isSoldOut ? 'bg-red-500 text-white' : 'bg-emerald-100 text-emerald-950'} px-1.5 py-0.5 rounded border border-black truncate">
                  ${isSoldOut ? '🔴 SOLD' : '🟢 READY'}
                </span>
              </div>

              <!-- Square Image Area -->
              <div class="w-full aspect-square bg-gradient-to-br from-amber-50 to-yellow-100 border-2 border-black rounded-xl mb-2 flex items-center justify-center p-1.5 shadow-brutal-sm overflow-hidden">
                <div class="product-img">
                  ${getFantasyIconSvg(item.iconType)}
                </div>
              </div>

              <h4 class="font-black text-xs sm:text-sm text-black leading-snug uppercase line-clamp-2">
                ${item.name}
              </h4>
              <p class="text-[10px] text-gray-600 font-semibold line-clamp-2 mt-0.5 leading-tight">
                ${item.description}
              </p>
            </div>

            <div class="mt-2.5 pt-2 border-t border-black/15">
              <div class="font-mono text-xs sm:text-sm font-black text-black mb-1.5">
                ${item.price}
              </div>

              ${isSoldOut ? `
                <button disabled 
                        class="w-full bg-neutral-300 text-gray-500 font-mono font-black text-[11px] py-1.5 rounded-xl border-2 border-black cursor-not-allowed text-center select-none">
                  SOLD OUT
                </button>
              ` : `
                <button onclick="handleProductBuy(${item.id})" 
                        class="w-full bg-brand-yellow hover:bg-yellow-400 active:scale-95 text-black font-mono font-black text-[11px] py-1.5 px-1 rounded-xl border-2 border-black shadow-brutal-sm flex items-center justify-center gap-1 transition">
                  <span>BUY NOW →</span>
                </button>
              `}
            </div>

          </div>
        `;
      }).join('');
    }

    function filterProducts(filterKey) {
      playBeep(450, 'sine', 0.05);
      currentFilter = filterKey;
      
      document.querySelectorAll('.filter-btn').forEach(btn => {
        if (btn.dataset.filter === filterKey) {
          btn.className = 'filter-btn bg-black text-white px-3 py-1 rounded-xl border-2 border-black font-mono text-[11px] font-black shadow-brutal-sm shrink-0 transition';
        } else {
          btn.className = 'filter-btn bg-white hover:bg-neutral-100 text-black px-3 py-1 rounded-xl border-2 border-black font-mono text-[11px] font-black shadow-brutal-sm shrink-0 transition';
        }
      });

      renderShop();
    }

    function handleProductBuy(productId) {
      playSuccessChime();
      const item = products.find(p => p.id === productId);
      if (!item || item.status === 'SOLD OUT') return;

      selectedProduct = item;
      
      document.getElementById('orderModalTitle').innerText = item.name;
      document.getElementById('orderModalDesc').innerText = item.description;
      document.getElementById('orderModalPrice').innerText = item.price;
      document.getElementById('orderModalRarity').innerHTML = getRarityBadge(item.rarity);
      document.getElementById('orderModalImageContainer').innerHTML = getFantasyIconSvg(item.iconType);

      openOrderModal();
    }

    function handleJokiOrder(serviceName, estimate) {
      playSuccessChime();
      const message = `Halo Leader BebanKlan! Saya mau booking jasa: *${serviceName}* (Estimasi: ${estimate}). Mau tanya slot dan prosesnya sekarang!`;
      const url = `https://wa.me/${APP_CONFIG.urls.whatsappNumber}?text=${encodeURIComponent(message)}`;
      window.open(url, '_blank');
    }

    function openOrderModal() {
      document.getElementById('orderModal').classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeOrderModal() {
      playBeep(330, 'sine', 0.05);
      document.getElementById('orderModal').classList.add('hidden');
      document.body.style.overflow = '';
    }

    function completeOrderVia(platform) {
      playSuccessChime();
      if (!selectedProduct) return;
      
      const message = `Halo Leader BebanKlan! Saya mau order item: *${selectedProduct.name}* seharga *${selectedProduct.price}*. Apakah masih ready stock?`;
      
      if (platform === 'WhatsApp') {
        const url = `https://wa.me/${APP_CONFIG.urls.whatsappNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
      } else {
        window.open(APP_CONFIG.urls.discordInvite, '_blank');
      }
      closeOrderModal();
    }

    function copyOrderFormat() {
      if (!selectedProduct) return;
      const text = `ORDER COC ITEM:\nItem: ${selectedProduct.name}\nHarga: ${selectedProduct.price}\nStatus: ${selectedProduct.status}\nCustomer: CLAN WARRIOR`;
      copyToClipboard(text, 'Format Order');
      closeOrderModal();
    }

    function handleAvatarError(img) {
      // Coba file backup image_a0625e.png terlebih dahulu jika image_a0840b.png sedang dimuat
      if (!img.dataset.triedBackup) {
        img.dataset.triedBackup = "true";
        img.src = "image_a0625e.png";
        return;
      }
      // Fallback visual meme Barbarian helm kuning jika file gambar lokal sedang dimuat
      img.onerror = null;
      img.src = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%233B0764'/><circle cx='50' cy='56' r='32' fill='%23F59E0B'/><path d='M20 44 C20 18 80 18 80 44 C80 48 74 50 68 45 C62 40 56 52 50 44 C44 52 38 40 32 45 C26 50 20 48 20 44 Z' fill='%23FACC15' stroke='%23121212' stroke-width='3'/><path d='M18 42 L18 78 L28 78 L28 54' fill='%23FACC15' stroke='%23121212' stroke-width='2.5'/><path d='M82 42 L82 78 L72 78 L72 54' fill='%23FACC15' stroke='%23121212' stroke-width='2.5'/><ellipse cx='42' cy='54' rx='3' ry='2' fill='%23121212'/><ellipse cx='58' cy='54' rx='3' ry='2' fill='%23121212'/><path d='M43 68 Q50 62 57 68 Q50 76 43 68 Z' fill='%237F1D1D' stroke='%23121212' stroke-width='2'/><rect x='46' y='64' width='8' height='3' fill='%23FFF'/><ellipse cx='38' cy='64' rx='2' ry='4' fill='%23C084FC'/><ellipse cx='62' cy='64' rx='2' ry='4' fill='%23C084FC'/><ellipse cx='48' cy='76' rx='2' ry='5' fill='%23E9D5FF'/><ellipse cx='53' cy='78' rx='2' ry='5' fill='%23E9D5FF'/></svg>";
    }

    function openAiAffiliate() {
      playSuccessChime();
      showToast('Membuka AI Klipper Affiliate Tool...', 'info');
      setTimeout(() => {
        window.open(APP_CONFIG.urls.aiKlipperAffiliate, '_blank');
      }, 350);
    }

    const donateModal = document.getElementById('donateModal');

    function openDonateModal() {
      playSuccessChime();
      donateModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeDonateModal() {
      playBeep(330, 'sine', 0.05);
      donateModal.classList.add('hidden');
      document.body.style.overflow = '';
    }

    let audioCtx = null;
    function playBeep(freq = 440, type = 'sine', duration = 0.08) {
      try {
        if (!audioCtx) {
          audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        }
        if (audioCtx.state === 'suspended') {
          audioCtx.resume();
        }
        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.type = type;
        osc.frequency.setValueAtTime(freq, audioCtx.currentTime);
        gain.gain.setValueAtTime(0.12, audioCtx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + duration);
        osc.connect(gain);
        gain.connect(audioCtx.destination);
        osc.start();
        osc.stop(audioCtx.currentTime + duration);
      } catch (e) {}
    }

    function playSuccessChime() {
      playBeep(523.25, 'triangle', 0.09);
      setTimeout(() => playBeep(659.25, 'triangle', 0.09), 60);
      setTimeout(() => playBeep(783.99, 'triangle', 0.16), 120);
    }

    function showToast(message, type = 'info') {
      const container = document.getElementById('toastContainer');
      const toast = document.createElement('div');
      toast.className = 'pointer-events-auto bg-brand-dark text-white border-3 border-black px-3.5 py-2.5 rounded-xl font-mono text-xs font-black shadow-brutal flex items-center gap-2 transform translate-x-full transition-transform duration-200 max-w-xs';
      
      let icon = '⚔️';
      if (type === 'copy') icon = '📋';
      if (type === 'queen') icon = '👑';
      if (type === 'king') icon = '🗡️';

      toast.innerHTML = `<span class="text-base">${icon}</span><span>${message}</span>`;
      container.appendChild(toast);

      requestAnimationFrame(() => toast.classList.remove('translate-x-full'));
      setTimeout(() => {
        toast.classList.add('translate-x-full');
        setTimeout(() => toast.remove(), 250);
      }, 2800);
    }

    function copyToClipboard(text, label = 'Data') {
      playSuccessChime();
      try {
        const dummy = document.createElement('textarea');
        dummy.value = text;
        dummy.style.position = 'fixed';
        dummy.style.opacity = '0';
        document.body.appendChild(dummy);
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        showToast(`${label} berhasil disalin!`, 'copy');
      } catch (err) {
        showToast(`Salin: ${text}`, 'copy');
      }
    }

    function triggerMascotCheer(character) {
      if (character === 'queen') {
        playBeep(659.25, 'triangle', 0.1);
        setTimeout(() => playBeep(880, 'sine', 0.15), 90);
        const quotes = [
          "Archer Queen: 'Kopi habis = Queen Walk buyar! Traktir leader dulu! ☕'",
          "Archer Queen: 'Panahku gak pernah miss, apalagi urusan kafein! 🏹'",
          "Archer Queen: 'Bantu support printer & filament biar clan war jalan terus!'",
          "Archer Queen: 'Siap 3-Star! Tapi kopi dulu satu cangkir! ✨'"
        ];
        const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
        showToast(randomQuote, 'queen');
      } else {
        playBeep(220, 'sawtooth', 0.12);
        setTimeout(() => playBeep(330, 'square', 0.18), 100);
        const quotes = [
          "Barbarian King: 'JOKI? GAS TEBAS! Base lawan pasti rata! ⚔️'",
          "Barbarian King: 'Trophy Legend & Wall max udah di depan mata!'",
          "Barbarian King: 'Pedang udah diasah, tinggal tunggu orderan klan!'",
          "Barbarian King: 'CLAN MODE: ON! Siap 100% Destruction! 🛡️'"
        ];
        const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
        showToast(randomQuote, 'king');
      }
    }

    /* Initialize Central Links */
    function initTiktokProfile() {
      const tt = APP_CONFIG.tiktok;
      if (!tt) return;

      const avatarImg = document.getElementById('tiktokAvatarImg');
      if (avatarImg && tt.avatarUrl) {
        avatarImg.src = tt.avatarUrl;
      }

      const topBadgeLink = document.getElementById('tiktokTopBadgeLink');
      const directBtn = document.getElementById('tiktokOpenDirectBtn');
      const avatarLink = document.getElementById('tiktokAvatarLink');
      const displayName = document.getElementById('tiktokDisplayName');
      const handle = document.getElementById('tiktokHandle');
      const followCta = document.getElementById('tiktokFollowCta');
      const bio = document.getElementById('tiktokBio');
      const statFollowing = document.getElementById('tiktokStatFollowing');
      const statFollowers = document.getElementById('tiktokStatFollowers');
      const statLikes = document.getElementById('tiktokStatLikes');

      if (topBadgeLink) topBadgeLink.href = tt.profileUrl;
      if (directBtn) directBtn.href = tt.profileUrl;
      if (avatarLink) avatarLink.href = tt.profileUrl;
      if (followCta) followCta.href = tt.profileUrl;
      
      if (displayName) displayName.innerText = tt.displayName;
      if (handle) handle.innerText = tt.username;
      if (bio) bio.innerText = `“${tt.bio}”`;

      if (statFollowing) statFollowing.innerText = tt.stats.following;
      if (statFollowers) statFollowers.innerText = tt.stats.followers;
      if (statLikes) statLikes.innerText = tt.stats.likes;
    }

    function initLinks() {
      initTiktokProfile();
      document.getElementById('donateSaweriaBtn').href = APP_CONFIG.urls.donateSaweria;
      document.getElementById('donateTrakteerBtn').href = APP_CONFIG.urls.donateTrakteer;
      document.getElementById('donateKofiBtn').href = APP_CONFIG.urls.donateKofi;
      
      document.getElementById('linkYoutube').href = APP_CONFIG.urls.socials.youtube;
      document.getElementById('linkTiktok').href = APP_CONFIG.urls.socials.tiktok;
      document.getElementById('linkInstagram').href = APP_CONFIG.urls.socials.instagram;
      document.getElementById('linkDiscord').href = APP_CONFIG.urls.socials.discord;
      document.getElementById('linkGithub').href = APP_CONFIG.urls.socials.github;
    }

    /* Modal Dismiss Listeners */
    window.addEventListener('click', (e) => {
      if (e.target === donateModal) closeDonateModal();
      if (e.target === document.getElementById('orderModal')) closeOrderModal();
    });

    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        closeDonateModal();
        closeOrderModal();
      }
    });

    const stickyBar = document.getElementById('stickyBottomBar');
    function handleScroll() {
      if (window.scrollY > 120) {
        stickyBar.classList.remove('translate-y-full');
      } else {
        stickyBar.classList.add('translate-y-full');
      }
    }
    window.addEventListener('scroll', handleScroll, { passive: true });

    document.addEventListener('DOMContentLoaded', () => {
      initLinks();
      renderLeaderboard();
      renderShop();
      handleScroll();
    });
  </script>
</body>
</html>
