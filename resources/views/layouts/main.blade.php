<!DOCTYPE html>
<html lang="id" data-theme="dark">
@include('layouts.header')

<body>

    @include('layouts.sidebar')

    <!-- MAIN -->
    <div class="main-content">
        @include('layouts.topbar')

        <!-- Content -->
        <main style="padding:18px;display:flex;flex-direction:column;gap:16px">

            <!-- STAT CARDS -->
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:12px" class="ai">

                <div class="stat-card cg" style="grid-column:span 2;min-width:0">
                    <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:10px">
                        <div>
                            <p class="mono"
                                style="font-size:9px;letter-spacing:.14em;color:var(--muted);margin-bottom:7px">TOTAL
                                PENDAPATAN</p>
                            <p style="font-size:clamp(22px,4vw,30px);font-weight:800;line-height:1">Rp 847M</p>
                        </div>
                        <span class="badge bg">↑ 12.4%</span>
                    </div>
                    <div class="spark-row">
                        <div class="spark" style="height:40%;background:rgba(92,255,163,.2)"></div>
                        <div class="spark" style="height:55%;background:rgba(92,255,163,.25)"></div>
                        <div class="spark" style="height:48%;background:rgba(92,255,163,.3)"></div>
                        <div class="spark" style="height:70%;background:rgba(92,255,163,.35)"></div>
                        <div class="spark" style="height:62%;background:rgba(92,255,163,.4)"></div>
                        <div class="spark" style="height:82%;background:rgba(92,255,163,.5)"></div>
                        <div class="spark" style="height:100%;background:var(--accent)"></div>
                    </div>
                    <p class="mono" style="font-size:9px;color:var(--muted);margin-top:7px">vs bulan lalu: +Rp 93M
                    </p>
                </div>

                <div class="stat-card cb">
                    <p class="mono" style="font-size:9px;letter-spacing:.14em;color:var(--muted);margin-bottom:7px">
                        PENGGUNA AKTIF</p>
                    <p style="font-size:26px;font-weight:800">24,891</p>
                    <div class="pbar">
                        <div class="pfill" style="width:73%;background:var(--accent3)"></div>
                    </div>
                    <div style="display:flex;justify-content:space-between;margin-top:6px">
                        <span class="mono" style="font-size:9px;color:var(--muted)">Target 34k</span>
                        <span class="badge bb">73%</span>
                    </div>
                </div>

                <div class="stat-card cr">
                    <p class="mono" style="font-size:9px;letter-spacing:.14em;color:var(--muted);margin-bottom:7px">
                        PESANAN BARU</p>
                    <p style="font-size:26px;font-weight:800">3,204</p>
                    <div class="pbar">
                        <div class="pfill" style="width:54%;background:var(--accent2)"></div>
                    </div>
                    <div style="display:flex;justify-content:space-between;margin-top:6px">
                        <span class="mono" style="font-size:9px;color:var(--muted)">Target 6k</span>
                        <span class="badge br">↓ 3.1%</span>
                    </div>
                </div>

                <div class="stat-card cp">
                    <p class="mono" style="font-size:9px;letter-spacing:.14em;color:var(--muted);margin-bottom:7px">
                        KONVERSI</p>
                    <p style="font-size:26px;font-weight:800">8.7%</p>
                    <div class="spark-row">
                        <div class="spark" style="height:50%;background:rgba(192,132,252,.2)"></div>
                        <div class="spark" style="height:65%;background:rgba(192,132,252,.3)"></div>
                        <div class="spark" style="height:55%;background:rgba(192,132,252,.3)"></div>
                        <div class="spark" style="height:75%;background:rgba(192,132,252,.4)"></div>
                        <div class="spark" style="height:90%;background:rgba(192,132,252,.5)"></div>
                        <div class="spark" style="height:70%;background:rgba(192,132,252,.4)"></div>
                        <div class="spark" style="height:100%;background:var(--purple)"></div>
                    </div>
                    <p class="mono" style="font-size:9px;color:var(--muted);margin-top:7px">Industry avg: 5.2%</p>
                </div>
            </div>

            <!-- CHART + ACTIVITY -->
            <div id="chartGrid" style="display:grid;gap:14px" class="ai">

                <!-- Chart -->
                <div class="stat-card">
                    <div
                        style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;flex-wrap:wrap;gap:8px">
                        <div>
                            <h3 style="font-size:14px;font-weight:800">Pendapatan Mingguan</h3>
                            <p class="mono" style="font-size:9px;color:var(--muted);margin-top:2px">7 hari terakhir
                            </p>
                        </div>
                        <div style="display:flex;gap:5px">
                            <button
                                style="font-family:'DM Mono',monospace;font-size:10px;padding:5px 12px;border-radius:99px;background:rgba(92,255,163,.12);color:var(--accent);border:1px solid rgba(92,255,163,.25);cursor:pointer">Minggu</button>
                            <button
                                style="font-family:'DM Mono',monospace;font-size:10px;padding:5px 12px;border-radius:99px;background:transparent;color:var(--muted);border:1px solid var(--border);cursor:pointer">Bulan</button>
                        </div>
                    </div>
                    <div style="display:flex;align-items:flex-end;gap:8px;height:130px">
                        <div style="display:flex;flex-direction:column;align-items:center;gap:5px;flex:1">
                            <div class="cbar" style="height:45%;background:rgba(92,255,163,.2)"></div><span
                                class="mono" style="font-size:9px;color:var(--muted)">Sen</span>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:center;gap:5px;flex:1">
                            <div class="cbar" style="height:70%;background:rgba(92,255,163,.3)"></div><span
                                class="mono" style="font-size:9px;color:var(--muted)">Sel</span>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:center;gap:5px;flex:1">
                            <div class="cbar" style="height:55%;background:rgba(92,255,163,.2)"></div><span
                                class="mono" style="font-size:9px;color:var(--muted)">Rab</span>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:center;gap:5px;flex:1">
                            <div class="cbar" style="height:88%;background:rgba(92,255,163,.4)"></div><span
                                class="mono" style="font-size:9px;color:var(--muted)">Kam</span>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:center;gap:5px;flex:1">
                            <div class="cbar" style="height:60%;background:rgba(92,255,163,.25)"></div><span
                                class="mono" style="font-size:9px;color:var(--muted)">Jum</span>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:center;gap:5px;flex:1">
                            <div class="cbar" style="height:100%;background:var(--accent)"></div><span
                                class="mono" style="font-size:9px;color:var(--accent)">Sab</span>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:center;gap:5px;flex:1">
                            <div class="cbar" style="height:75%;background:rgba(92,255,163,.3)"></div><span
                                class="mono" style="font-size:9px;color:var(--muted)">Min</span>
                        </div>
                    </div>
                    <div
                        style="display:flex;gap:14px;margin-top:12px;padding-top:12px;border-top:1px solid var(--border)">
                        <div style="display:flex;align-items:center;gap:5px">
                            <div class="dot" style="background:var(--accent)"></div><span class="mono"
                                style="font-size:9px;color:var(--muted)">Pendapatan</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:5px">
                            <div class="dot" style="background:var(--accent3)"></div><span class="mono"
                                style="font-size:9px;color:var(--muted)">Target</span>
                        </div>
                    </div>
                </div>

                <!-- Activity -->
                <div class="stat-card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px">
                        <h3 style="font-size:14px;font-weight:800">Aktivitas Terkini</h3>
                        <span style="font-size:11px;color:var(--accent);cursor:pointer;font-weight:700">Lihat semua
                            →</span>
                    </div>
                    <div class="aitem">
                        <div class="ava" style="background:var(--accent);color:#05150c">BW</div>
                        <div>
                            <p style="font-size:12px;font-weight:700">Budi Wijaya</p>
                            <p class="mono" style="font-size:10px;color:var(--muted);margin-top:2px">Pesanan baru
                                #4521</p>
                            <p class="mono" style="font-size:9px;color:var(--muted);margin-top:3px">2 menit lalu</p>
                        </div>
                    </div>
                    <div class="aitem">
                        <div class="ava" style="background:var(--accent3);color:#fff">SR</div>
                        <div>
                            <p style="font-size:12px;font-weight:700">Sinta Rahayu</p>
                            <p class="mono" style="font-size:10px;color:var(--muted);margin-top:2px">Akun baru
                                terdaftar</p>
                            <p class="mono" style="font-size:9px;color:var(--muted);margin-top:3px">14 menit lalu
                            </p>
                        </div>
                    </div>
                    <div class="aitem">
                        <div class="ava" style="background:var(--accent2);color:#fff">DP</div>
                        <div>
                            <p style="font-size:12px;font-weight:700">Doni Pratama</p>
                            <p class="mono" style="font-size:10px;color:var(--muted);margin-top:2px">Refund diproses
                                #4498</p>
                            <p class="mono" style="font-size:9px;color:var(--muted);margin-top:3px">1 jam lalu</p>
                        </div>
                    </div>
                    <div class="aitem">
                        <div class="ava" style="background:var(--purple);color:#fff">LA</div>
                        <div>
                            <p style="font-size:12px;font-weight:700">Lisa Anggraini</p>
                            <p class="mono" style="font-size:10px;color:var(--muted);margin-top:2px">Update stok
                                produk</p>
                            <p class="mono" style="font-size:9px;color:var(--muted);margin-top:3px">2 jam lalu</p>
                        </div>
                    </div>
                    <div class="aitem">
                        <div class="ava" style="background:var(--yellow);color:#111">MH</div>
                        <div>
                            <p style="font-size:12px;font-weight:700">Muhamad Haris</p>
                            <p class="mono" style="font-size:10px;color:var(--muted);margin-top:2px">Pesanan selesai
                                #4489</p>
                            <p class="mono" style="font-size:9px;color:var(--muted);margin-top:3px">3 jam lalu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLE -->
            <div class="stat-card ai">
                <div
                    style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;flex-wrap:wrap;gap:8px">
                    <div>
                        <h3 style="font-size:14px;font-weight:800">Transaksi Terbaru</h3>
                        <p class="mono" style="font-size:9px;color:var(--muted);margin-top:2px">50 entri terakhir
                        </p>
                    </div>
                    <button
                        style="font-family:'DM Mono',monospace;font-size:10px;padding:6px 13px;border-radius:9px;background:rgba(92,255,163,.1);color:var(--accent);border:1px solid rgba(92,255,163,.2);cursor:pointer;font-weight:700">↓
                        Export CSV</button>
                </div>
                <div style="overflow-x:auto">
                    <div style="min-width:500px">
                        <div class="trow" style="color:var(--muted)">
                            <span class="mono" style="font-size:9px;letter-spacing:.12em">PELANGGAN</span>
                            <span class="mono" style="font-size:9px;letter-spacing:.12em">JUMLAH</span>
                            <span class="mono" style="font-size:9px;letter-spacing:.12em">STATUS</span>
                            <span class="mono" style="font-size:9px;letter-spacing:.12em">TANGGAL</span>
                        </div>
                        <div class="trow">
                            <div style="display:flex;align-items:center;gap:7px">
                                <div class="dot" style="background:var(--accent)"></div><span
                                    style="font-weight:700">Budi Santoso</span>
                            </div><span class="mono" style="font-size:12px">Rp 2.400.000</span><span
                                class="badge bg">✓ Selesai</span><span class="mono"
                                style="font-size:10px;color:var(--muted)">20 Feb 2026</span>
                        </div>
                        <div class="trow">
                            <div style="display:flex;align-items:center;gap:7px">
                                <div class="dot" style="background:var(--accent3)"></div><span
                                    style="font-weight:700">Dewi Kusuma</span>
                            </div><span class="mono" style="font-size:12px">Rp 890.000</span><span
                                class="badge bb">⟳ Diproses</span><span class="mono"
                                style="font-size:10px;color:var(--muted)">20 Feb 2026</span>
                        </div>
                        <div class="trow">
                            <div style="display:flex;align-items:center;gap:7px">
                                <div class="dot" style="background:var(--accent2)"></div><span
                                    style="font-weight:700">Riko Ardiansyah</span>
                            </div><span class="mono" style="font-size:12px">Rp 5.700.000</span><span
                                class="badge br">✕ Dibatalkan</span><span class="mono"
                                style="font-size:10px;color:var(--muted)">19 Feb 2026</span>
                        </div>
                        <div class="trow">
                            <div style="display:flex;align-items:center;gap:7px">
                                <div class="dot" style="background:var(--accent)"></div><span
                                    style="font-weight:700">Nurul Hidayah</span>
                            </div><span class="mono" style="font-size:12px">Rp 1.150.000</span><span
                                class="badge bg">✓ Selesai</span><span class="mono"
                                style="font-size:10px;color:var(--muted)">19 Feb 2026</span>
                        </div>
                        <div class="trow">
                            <div style="display:flex;align-items:center;gap:7px">
                                <div class="dot" style="background:var(--yellow)"></div><span
                                    style="font-weight:700">Agus Firmansyah</span>
                            </div><span class="mono" style="font-size:12px">Rp 3.200.000</span><span
                                class="badge by">⏱ Menunggu</span><span class="mono"
                                style="font-size:10px;color:var(--muted)">18 Feb 2026</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BOTTOM ROW -->
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:14px"
                class="ai">

                <!-- Products -->
                <div class="stat-card">
                    <h3 style="font-size:14px;font-weight:800;margin-bottom:14px">Produk Terlaris</h3>
                    <div style="display:flex;flex-direction:column;gap:12px">
                        <div>
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px">
                                <span style="font-weight:700">Laptop Gaming Pro X</span><span class="mono"
                                    style="color:var(--accent)">Rp 124M</span>
                            </div>
                            <div class="pbar">
                                <div class="pfill" style="width:90%;background:var(--accent)"></div>
                            </div>
                        </div>
                        <div>
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px">
                                <span style="font-weight:700">Smartphone Ultra S25</span><span class="mono"
                                    style="color:var(--accent3)">Rp 98M</span>
                            </div>
                            <div class="pbar">
                                <div class="pfill" style="width:72%;background:var(--accent3)"></div>
                            </div>
                        </div>
                        <div>
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px">
                                <span style="font-weight:700">Headset Studio Pro</span><span class="mono"
                                    style="color:var(--purple)">Rp 67M</span>
                            </div>
                            <div class="pbar">
                                <div class="pfill" style="width:50%;background:var(--purple)"></div>
                            </div>
                        </div>
                        <div>
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px">
                                <span style="font-weight:700">Mechanical Keyboard TKL</span><span class="mono"
                                    style="color:var(--yellow)">Rp 42M</span>
                            </div>
                            <div class="pbar">
                                <div class="pfill" style="width:32%;background:var(--yellow)"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Status -->
                <div class="stat-card">
                    <h3 style="font-size:14px;font-weight:800;margin-bottom:14px">Status Sistem</h3>
                    <div style="display:flex;flex-direction:column;gap:7px">
                        <div
                            style="display:flex;align-items:center;justify-content:space-between;padding:9px 12px;border-radius:9px;background:rgba(92,255,163,.06);border:1px solid rgba(92,255,163,.15)">
                            <div style="display:flex;align-items:center;gap:8px">
                                <div class="dot" style="background:var(--accent);box-shadow:0 0 6px var(--accent)">
                                </div><span style="font-size:12px;font-weight:700">API Server</span>
                            </div>
                            <div style="display:flex;align-items:center;gap:7px"><span class="mono"
                                    style="font-size:9px;color:var(--muted)">12ms</span><span
                                    class="badge bg">Online</span></div>
                        </div>
                        <div
                            style="display:flex;align-items:center;justify-content:space-between;padding:9px 12px;border-radius:9px;background:rgba(92,255,163,.06);border:1px solid rgba(92,255,163,.15)">
                            <div style="display:flex;align-items:center;gap:8px">
                                <div class="dot" style="background:var(--accent);box-shadow:0 0 6px var(--accent)">
                                </div><span style="font-size:12px;font-weight:700">Database</span>
                            </div>
                            <div style="display:flex;align-items:center;gap:7px"><span class="mono"
                                    style="font-size:9px;color:var(--muted)">3ms</span><span
                                    class="badge bg">Online</span></div>
                        </div>
                        <div
                            style="display:flex;align-items:center;justify-content:space-between;padding:9px 12px;border-radius:9px;background:rgba(251,191,36,.05);border:1px solid rgba(251,191,36,.2)">
                            <div style="display:flex;align-items:center;gap:8px">
                                <div class="dot" style="background:var(--yellow)"></div><span
                                    style="font-size:12px;font-weight:700">CDN Storage</span>
                            </div>
                            <div style="display:flex;align-items:center;gap:7px"><span class="mono"
                                    style="font-size:9px;color:var(--muted)">45ms</span><span
                                    class="badge by">Lambat</span></div>
                        </div>
                        <div
                            style="display:flex;align-items:center;justify-content:space-between;padding:9px 12px;border-radius:9px;background:rgba(92,255,163,.06);border:1px solid rgba(92,255,163,.15)">
                            <div style="display:flex;align-items:center;gap:8px">
                                <div class="dot" style="background:var(--accent);box-shadow:0 0 6px var(--accent)">
                                </div><span style="font-size:12px;font-weight:700">Payment Gateway</span>
                            </div>
                            <div style="display:flex;align-items:center;gap:7px"><span class="mono"
                                    style="font-size:9px;color:var(--muted)">28ms</span><span
                                    class="badge bg">Online</span></div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="stat-card">
                    <h3 style="font-size:14px;font-weight:800;margin-bottom:14px">Aksi Cepat</h3>
                    <div style="display:flex;flex-direction:column;gap:7px">
                        <button class="qbtn" onmouseover="this.style.borderColor='var(--accent)'"
                            onmouseout="this.style.borderColor='var(--border)'">
                            <div
                                style="width:28px;height:28px;border-radius:8px;background:rgba(92,255,163,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <svg width="13" height="13" fill="none" stroke="var(--accent)"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                            </div>
                            Tambah Produk Baru
                        </button>
                        <button class="qbtn" onmouseover="this.style.borderColor='var(--accent3)'"
                            onmouseout="this.style.borderColor='var(--border)'">
                            <div
                                style="width:28px;height:28px;border-radius:8px;background:rgba(107,140,255,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <svg width="13" height="13" fill="none" stroke="var(--accent3)"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                                </svg>
                            </div>
                            Undang Pengguna
                        </button>
                        <button class="qbtn" onmouseover="this.style.borderColor='var(--purple)'"
                            onmouseout="this.style.borderColor='var(--border)'">
                            <div
                                style="width:28px;height:28px;border-radius:8px;background:rgba(192,132,252,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <svg width="13" height="13" fill="none" stroke="var(--purple)"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 15V3m0 12l-4-4m4 4l4-4M4 19h16" />
                                </svg>
                            </div>
                            Export Laporan
                        </button>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const dark = html.getAttribute('data-theme') === 'dark';
            html.setAttribute('data-theme', dark ? 'light' : 'dark');
            document.getElementById('themeLabel').textContent = dark ? 'Light' : 'Dark';
            try {
                localStorage.setItem('nexus-theme', dark ? 'light' : 'dark');
            } catch (e) {}
        }

        // Restore saved theme
        try {
            const saved = localStorage.getItem('nexus-theme');
            if (saved) {
                document.documentElement.setAttribute('data-theme', saved);
                const lbl = document.getElementById('themeLabel');
                if (lbl) lbl.textContent = saved === 'dark' ? 'Dark' : 'Light';
            }
        } catch (e) {}

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('overlay').classList.toggle('show');
        }

        function checkBreakpoint() {
            const w = window.innerWidth;
            document.getElementById('hamburger').style.display = w < 1024 ? 'flex' : 'none';
            document.getElementById('searchBox').style.display = w < 768 ? 'none' : 'flex';
            if (w >= 1024) {
                document.getElementById('sidebar').classList.remove('open');
                document.getElementById('overlay').classList.remove('show');
            }
            // Chart grid responsive
            const cg = document.getElementById('chartGrid');
            cg.style.gridTemplateColumns = w >= 1024 ? '1fr 300px' : '1fr';
        }

        checkBreakpoint();
        window.addEventListener('resize', checkBreakpoint);
    </script>
</body>

</html>
