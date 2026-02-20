<!-- Topbar -->
<header class="topbar">
    <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 16px;gap:10px">
        <div style="display:flex;align-items:center;gap:10px">
            <button class="ibtn" id="hamburger" onclick="toggleSidebar()" style="display:none">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M3 12h18M3 6h18M3 18h18" />
                </svg>
            </button>
            <div>
                <h1 style="font-size:16px;font-weight:800">Dashboard</h1>
                <p class="mono" style="font-size:9px;color:var(--muted)">Jumat, 20 Februari 2026</p>
            </div>
        </div>

        <div style="display:flex;align-items:center;gap:8px">
            <div class="sbox" id="searchBox">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.35-4.35" />
                </svg>
                <span class="mono">Cari...</span>
                <kbd class="mono"
                    style="font-size:9px;padding:2px 5px;border-radius:4px;background:var(--border);color:var(--muted)">⌘K</kbd>
            </div>

            @include('layouts.theme-toggle')

            <button class="ibtn" style="position:relative">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
                <span
                    style="position:absolute;top:4px;right:4px;width:6px;height:6px;border-radius:50%;background:var(--accent2);border:1.5px solid var(--surface)"></span>
            </button>

            <div class="ava"
                style="background:var(--accent);color:#05150c;width:32px;height:32px;cursor:pointer;font-size:11px">
                AZ</div>
        </div>
    </div>
</header>
