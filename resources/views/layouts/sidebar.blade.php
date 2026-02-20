<div id="overlay" onclick="toggleSidebar()"></div>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div style="padding:18px 18px;border-bottom:1px solid var(--border)">
        <div style="display:flex;align-items:center;gap:10px">
            <div
                style="width:30px;height:30px;border-radius:8px;background:var(--accent);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                <svg style="width:14px;height:14px;color:#05150c" fill="none" stroke="currentColor" stroke-width="2.5"
                    viewBox="0 0 24 24">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <span style="font-weight:800;font-size:13px;letter-spacing:.07em">NEXUS<span
                    style="color:var(--accent)">OS</span></span>
        </div>
    </div>

    <nav style="padding:10px;flex:1;overflow-y:auto">
        <p class="mono" style="font-size:9px;padding:8px 10px;letter-spacing:.15em;color:var(--muted)">MENU UTAMA
        </p>
        <div class="nav-item active">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1" />
                <rect x="14" y="3" width="7" height="7" rx="1" />
                <rect x="3" y="14" width="7" height="7" rx="1" />
                <rect x="14" y="14" width="7" height="7" rx="1" />
            </svg>
            Dashboard
        </div>
        <div class="nav-item">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path
                    d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
            </svg>
            Transaksi
            <span class="badge bb" style="margin-left:auto">12</span>
        </div>
        <div class="nav-item">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4" />
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
            </svg>
            Pengguna
        </div>
        <div class="nav-item">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
            Produk
        </div>
        <div class="nav-item">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path d="M18 20V10m-6 10V4M6 20v-6" />
            </svg>
            Analitik
        </div>
        <p class="mono" style="font-size:9px;padding:16px 10px 8px;letter-spacing:.15em;color:var(--muted)">SISTEM
        </p>
        <div class="nav-item">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3" />
                <path d="M19.07 4.93A10 10 0 0 0 4.93 19.07M4.93 4.93a10 10 0 0 0 0 14.14" />
            </svg>
            Pengaturan
        </div>
        <div class="nav-item">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9" />
            </svg>
            Keluar
        </div>
    </nav>

    <div style="padding:12px 14px;border-top:1px solid var(--border)">
        <div style="display:flex;align-items:center;gap:9px">
            <div class="ava" style="background:var(--accent);color:#05150c">AZ</div>
            <div style="flex:1;min-width:0">
                <p style="font-size:12px;font-weight:800;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                    Andi Zulkarnain</p>
                <p class="mono"
                    style="font-size:9px;color:var(--muted);overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                    admin@nexusos.id</p>
            </div>
            <div class="dot" style="background:var(--accent);box-shadow:0 0 6px var(--accent)"></div>
        </div>
    </div>
</aside>
