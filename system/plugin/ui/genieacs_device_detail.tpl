{include file="sections/header.tpl"}

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Fonts: DM Sans + DM Mono -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<!-- Icons: Phosphor Icons (modern, clean) -->
<script src="https://unpkg.com/@phosphor-icons/web@2.1.1/src/index.js"></script>
<!-- Network Mapping Custom CSS -->
<link rel="stylesheet" href="system/plugin/ui/css/network_mapping.css" />

<style>
{literal}
/* ===================== DEVICE DETAIL — DESIGN SYSTEM ===================== */
* { box-sizing: border-box; }
.bk-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; font-family: 'DM Sans', sans-serif; margin-bottom: 16px; }
.bk-card-header { display: flex; align-items: center; gap: 10px; padding: 14px 18px; border-bottom: 1px solid #f1f5f9; background: #fafcff; }
.bk-card-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.bk-card-title { font-size: 13px; font-weight: 700; color: #0f172a; }
.bk-card-subtitle { font-size: 11px; color: #94a3b8; }
.bk-card-body { padding: 18px; }
.bk-label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px; }
.bk-input { width: 100%; height: 36px; padding: 0 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #0f172a; background: #f8fafc; outline: none; transition: border-color 0.15s, box-shadow 0.15s; box-sizing: border-box; }
.bk-input:focus { border-color: #0271c6; background: #fff; box-shadow: 0 0 0 3px rgba(2,113,198,0.10); }
.bk-input::placeholder { color: #cbd5e1; }
.bk-btn { display: inline-flex; align-items: center; justify-content: center; gap: 6px; height: 36px; padding: 0 16px; border-radius: 8px; font-size: 13px; font-weight: 600; font-family: 'DM Sans', sans-serif; cursor: pointer; border: none; transition: all 0.15s; text-decoration: none; white-space: nowrap; box-sizing: border-box; }
.bk-btn-primary { background: #0271c6; color: white; box-shadow: 0 2px 8px rgba(2,113,198,0.25); }
.bk-btn-primary:hover { background: #0359a0; color: white; text-decoration: none; }
.bk-btn-success { background: #16a34a; color: white; }
.bk-btn-success:hover { background: #15803d; color: white; text-decoration: none; }
.bk-btn-warning { background: #fef3c7; color: #d97706; border: 1px solid #fde68a; }
.bk-btn-warning:hover { background: #fde68a; text-decoration: none; }
.bk-btn-danger { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
.bk-btn-danger:hover { background: #fecaca; text-decoration: none; }
.bk-btn-ghost { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
.bk-btn-ghost:hover { background: #e2e8f0; color: #0f172a; text-decoration: none; }
.bk-btn-sm { height: 30px; padding: 0 12px; font-size: 12px; border-radius: 6px; }
.bk-btn-icon { height: 30px; width: 30px; padding: 0; border-radius: 7px; }
.bk-form-group { display: flex; flex-direction: column; gap: 5px; margin-bottom: 14px; }
.bk-form-group:last-child { margin-bottom: 0; }
.bk-help { font-size: 11px; color: #94a3b8; margin-top: 3px; }
.bk-input-wrap { position: relative; display: flex; align-items: center; }
.bk-input-wrap .bk-input { padding-right: 38px; }
.bk-eye-btn { position: absolute; right: 10px; background: none; border: none; cursor: pointer; color: #94a3b8; font-size: 14px; padding: 0; }
.bk-eye-btn:hover { color: #475569; }

/* ---- Status badges ---- */
.dd-status { display: inline-flex; align-items: center; gap: 5px; padding: 3px 9px; border-radius: 20px; font-size: 11px; font-weight: 600; white-space: nowrap; }
.dd-online { background: #dcfce7; color: #15803d; }
.dd-offline { background: #fee2e2; color: #dc2626; }
.dd-pulse { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
.dd-pulse-g { background: #22c55e; animation: ddPG 2s infinite; }
.dd-pulse-r { background: #ef4444; animation: ddPR 2s infinite; }
@keyframes ddPG { 0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,0.6)} 70%{box-shadow:0 0 0 5px rgba(34,197,94,0)} }
@keyframes ddPR { 0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,0.6)}  70%{box-shadow:0 0 0 5px rgba(239,68,68,0)} }

/* Badge Device Detail */
.dd-badge-detail { display:inline-flex;align-items:center;gap:5px;background:#f1f5f9;border:1px solid #e2e8f0;color:#475569;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px; }

/* Tombol Kembali — header mobile only & action bar desktop only */
.dd-back-header { display:none;align-items:center;gap:5px;height:28px;padding:0 10px;border-radius:20px;border:1px solid #e2e8f0;background:#f8fafc;color:#475569;font-size:11px;font-weight:600;font-family:'DM Sans',sans-serif;flex-shrink:0;text-decoration:none;transition:all 0.12s;white-space:nowrap; }
.dd-back-header:hover { background:#e2e8f0;color:#0f172a;text-decoration:none; }
.dd-back-desktop { display:inline-flex; }

/* Desktop: pill circle disembunyikan — ikon langsung tampil */
.dd-pill-circle { display:none;width:28px;height:28px;border-radius:50%;align-items:center;justify-content:center;flex-shrink:0; }

/* ---- Breadcrumb ---- */
.dd-bc { display: flex; align-items: center; gap: 6px; font-size: 12px; color: #94a3b8; font-family: 'DM Sans', sans-serif; margin-top: 4px; }
.dd-bc a { color: #0271c6; text-decoration: none; }
.dd-bc a:hover { text-decoration: underline; }

/* ---- Device Hero Header v2 (Opsi H1) ---- */
.dd-hero { display: flex; gap: 18px; padding: 20px 22px; background: linear-gradient(135deg, #fff 0%, #f0f9ff 55%, #eff6ff 100%); border-bottom: 1px solid #f1f5f9; position: relative; overflow: hidden; transition: background 0.4s ease; }
.dd-hero.dd-hero-offline { background: linear-gradient(135deg, #fff 0%, #fef2f2 55%, #fee2e2 100%); }
.dd-hero::before { content: ''; position: absolute; top: -40px; right: -40px; width: 180px; height: 180px; border-radius: 50%; background: radial-gradient(circle, rgba(2,113,198,0.08) 0%, transparent 70%); pointer-events: none; transition: background 0.4s ease; }
.dd-hero.dd-hero-offline::before { background: radial-gradient(circle, rgba(220,38,38,0.10) 0%, transparent 70%); }
.dd-hero-avatar { width: 64px; height: 64px; border-radius: 16px; background: linear-gradient(135deg, #0271c6 0%, #0ea5e9 100%); display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; box-shadow: 0 6px 16px rgba(2,113,198,0.3); position: relative; z-index: 1; transition: background 0.4s ease, box-shadow 0.4s ease; }
.dd-hero.dd-hero-offline .dd-hero-avatar { background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%); box-shadow: 0 6px 16px rgba(220,38,38,0.3); }
.dd-hero-avatar-pulse { position: absolute; bottom: -4px; right: -4px; width: 18px; height: 18px; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
.dd-hero-avatar-pulse-dot { width: 10px; height: 10px; border-radius: 50%; }
.dd-hero-avatar-pulse-dot.on { background: #22c55e; animation: ddHeroPulseGreen 2s infinite; }
.dd-hero-avatar-pulse-dot.off { background: #ef4444; animation: ddHeroPulseRed 2s infinite; }
@keyframes ddHeroPulseGreen { 0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,0.6)} 70%{box-shadow:0 0 0 6px rgba(34,197,94,0)} }
@keyframes ddHeroPulseRed   { 0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,0.6)}  70%{box-shadow:0 0 0 6px rgba(239,68,68,0)} }
.dd-hero-body { min-width: 0; flex: 1; z-index: 1; }
.dd-hero-row1 { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 4px; }
.dd-hero-user { font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1.15; display: inline-flex; align-items: center; gap: 7px; }
.dd-hero-user-icon { color: #0271c6; flex-shrink: 0; }
.dd-hero-status { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
.dd-hero-status.on { background: #dcfce7; color: #15803d; }
.dd-hero-status.off { background: #fee2e2; color: #dc2626; }
.dd-hero-lastseen { font-size: 11px; color: #94a3b8; font-weight: 500; display: inline-flex; align-items: center; gap: 5px; }
.dd-hero-row2 { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; }
.dd-hero-model { font-size: 13px; font-weight: 600; color: #475569; }
.dd-hero-model-vendor { color: #0271c6; font-weight: 700; }
.dd-hero-actions-desktop { display: flex; align-items: flex-start; gap: 6px; flex-shrink: 0; z-index: 1; }

/* ---- Action bar — pill buttons desktop, icon+label mobile ---- */
.dd-action-bar { display: flex; align-items: center; justify-content: flex-end; padding: 8px 18px; gap: 6px; background: #fafcff; border-bottom: 1px solid #f1f5f9; }
.dd-action-bar-divider { width: 1px; height: 18px; background: #e2e8f0; margin: 0 2px; flex-shrink: 0; }
/* Desktop: hide mobile action bar (actions di hero .dd-hero-actions-desktop) */
@media (min-width: 768px) { .dd-action-bar { display: none; } }

/* Desktop: pill button — selalu punya background + border (match tombol Back) */
.dd-pill-btn { display: inline-flex !important; align-items: center !important; gap: 6px !important; height: 30px !important; min-height: unset !important; max-height: 30px !important; padding: 0 12px !important; border-radius: 20px !important; border: 1px solid #e2e8f0 !important; background: #f8fafc !important; font-size: 12px !important; font-weight: 600 !important; font-family: 'DM Sans', sans-serif !important; cursor: pointer !important; transition: all 0.12s !important; text-decoration: none !important; white-space: nowrap !important; flex-shrink: 0 !important; line-height: 1 !important; box-shadow: none !important; vertical-align: middle !important; }
.dd-pill-btn svg { flex-shrink: 0; }
.dd-pill-btn.refresh { color: #0271c6 !important; border-color: #bfdbfe !important; background: #eff6ff !important; }
.dd-pill-btn.refresh:hover { background: #dbeafe !important; border-color: #93c5fd !important; text-decoration: none !important; }
.dd-pill-btn.summon { color: #16a34a !important; border-color: #bbf7d0 !important; background: #f0fdf4 !important; }
.dd-pill-btn.summon:hover { background: #dcfce7 !important; border-color: #86efac !important; text-decoration: none !important; }
.dd-pill-btn.reboot { color: #dc2626 !important; border-color: #fecaca !important; background: #fef2f2 !important; }
.dd-pill-btn.reboot:hover { background: #fee2e2 !important; border-color: #fca5a5 !important; text-decoration: none !important; }
.dd-pill-btn.back { color: #64748b !important; border: 1px solid #e2e8f0 !important; background: #f8fafc !important; }
.dd-pill-btn.back:hover { background: #e2e8f0 !important; color: #0f172a !important; text-decoration: none !important; }

/* Pill dengan teks untuk tombol di dalam card header (edit, refresh) */
.dd-action-btn { display: inline-flex; align-items: center; gap: 5px; height: 28px; padding: 0 10px; border-radius: 20px; border: none; background: transparent; cursor: pointer; font-size: 11px; font-weight: 600; font-family: 'DM Sans', sans-serif; transition: all 0.12s; text-decoration: none; flex-shrink: 0; white-space: nowrap; }
.dd-action-btn.edit { color: #7c3aed; border: 1px solid #ddd6fe; background: #f5f3ff; }
.dd-action-btn.edit:hover { background: #ede9fe; }
.dd-action-btn.refresh-sm { color: #0271c6; border: 1px solid #bfdbfe; background: #eff6ff; }
.dd-action-btn.refresh-sm:hover { background: #dbeafe; }
.dd-action-btn.refresh { color: #0271c6; border: 1px solid #bfdbfe; background: #eff6ff; }
.dd-action-btn.refresh:hover { background: #dbeafe; }

/* ---- Info grid — 3 column ---- */
.dd-info-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
.dd-info-item { background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 10px; padding: 12px 14px; display: flex; align-items: center; gap: 10px; }
.dd-info-icon { width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; font-size: 14px; color: #0271c6; flex-shrink: 0; }
.dd-info-label { font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; }
.dd-info-value { font-size: 13px; font-weight: 600; color: #0f172a; word-break: break-word; margin-top: 2px; min-width: 0; }
.dd-info-content { min-width: 0; flex: 1; }

/* ---- Device Information — REDESIGN v2 (hero + grouped metrics) ---- */
.dd-identity-hero { display: flex; align-items: center; gap: 16px; padding: 16px 18px; background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%); border: 1px solid #e0e7ff; border-radius: 12px; margin-bottom: 18px; position: relative; overflow: hidden; }
.dd-identity-hero.dd-identity-offline { background: linear-gradient(135deg, #fff 0%, #fef2f2 55%, #fee2e2 100%); border-color: #fecaca; }
.dd-identity-hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at 90% 10%, rgba(2,113,198,0.08) 0%, transparent 50%); pointer-events: none; }
.dd-identity-hero.dd-identity-offline::before { background: radial-gradient(circle at 90% 10%, rgba(220,38,38,0.08) 0%, transparent 50%); }
.dd-identity-icon { width: 52px; height: 52px; border-radius: 12px; background: linear-gradient(135deg, #0271c6, #0ea5e9); display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; box-shadow: 0 4px 10px rgba(2,113,198,0.25); z-index: 1; }
.dd-identity-hero.dd-identity-offline .dd-identity-icon { background: linear-gradient(135deg, #dc2626, #ef4444); box-shadow: 0 4px 10px rgba(220,38,38,0.25); }
.dd-identity-main { min-width: 0; flex: 1; z-index: 1; }
.dd-identity-title { font-size: 16px; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px; flex-wrap: wrap; line-height: 1.2; }
.dd-identity-vendor { color: #0271c6; }
.dd-identity-sep { color: #cbd5e1; font-weight: 400; }
.dd-identity-id-row { display: flex; align-items: center; gap: 8px; margin-top: 8px; flex-wrap: nowrap; min-width: 0; }
.dd-identity-id { font-family: 'DM Mono', ui-monospace, monospace; font-size: 11px; color: #475569; background: #fff; border: 1px solid #e2e8f0; padding: 4px 10px; border-radius: 6px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex: 1; min-width: 0; }
.dd-identity-copy { background: #fff; border: 1px solid #e2e8f0; color: #475569; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 6px; cursor: pointer; display: inline-flex; align-items: center; gap: 5px; transition: all 0.15s; white-space: nowrap; flex-shrink: 0; }
.dd-identity-copy:hover { background: #0271c6; color: #fff; border-color: #0271c6; }
.dd-identity-copy.copied { background: #16a34a; color: #fff; border-color: #16a34a; }
.dd-identity-tags { display: flex; gap: 6px; flex-shrink: 0; z-index: 1; align-items: center; flex-wrap: wrap; justify-content: flex-end; }

/* Grouped metric sections */
.dd-metric-section { margin-bottom: 16px; }
.dd-metric-section:last-child { margin-bottom: 0; }
.dd-metric-section-title { display: flex; align-items: center; gap: 8px; margin-bottom: 10px; font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; }
.dd-metric-section-title::after { content: ''; flex: 1; height: 1px; background: linear-gradient(to right, #e2e8f0, transparent); margin-left: 4px; }
.dd-metric-section-title svg { color: #94a3b8; }
.dd-metric-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; align-items: stretch; }
.dd-metric-card { background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 12px 14px; display: flex; align-items: center; gap: 10px; transition: border-color 0.15s, transform 0.15s, box-shadow 0.15s; min-width: 0; box-shadow: 0 1px 2px rgba(15,23,42,0.03); }
.dd-metric-card:hover { border-color: #94a3b8; transform: translateY(-1px); box-shadow: 0 4px 10px rgba(15,23,42,0.07); }
.dd-metric-icon { width: 34px; height: 34px; border-radius: 9px; background: #eff6ff; display: flex; align-items: center; justify-content: center; color: #0271c6; flex-shrink: 0; }
.dd-metric-body { min-width: 0; flex: 1; }
.dd-metric-label { font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; line-height: 1; }
.dd-metric-value { font-size: 13px; font-weight: 600; color: #0f172a; margin-top: 4px; line-height: 1.25; word-break: break-word; min-width: 0; }
.dd-metric-card.dd-metric-wide { grid-column: span 2; }
.dd-metric-na { color: #cbd5e1; font-weight: 500; font-style: italic; }
/* Last Inform selalu full width di semua breakpoint */
.dd-info-last { grid-column: 1 / -1; }

/* Badge value responsive — bisa wrap teks */
.dd-badge-ip, .dd-badge-mac, .dd-badge-user, .dd-badge-plain,
.dd-badge-temp-ok, .dd-badge-temp-warm, .dd-badge-temp-hot,
.dd-badge-rx-good, .dd-badge-rx-fair, .dd-badge-rx-poor, .dd-badge-rx-na {
    max-width: 100%; word-break: break-all; white-space: normal; }

/* ---- Value Badges (same as gd-badge-* in devices page) ---- */
.dd-badge-rx-good { display:inline-flex;align-items:center;gap:4px;background:#dcfce7;border:1px solid #bbf7d0;color:#15803d;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-rx-fair { display:inline-flex;align-items:center;gap:4px;background:#fef3c7;border:1px solid #fde68a;color:#d97706;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-rx-poor { display:inline-flex;align-items:center;gap:4px;background:#fee2e2;border:1px solid #fecaca;color:#dc2626;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-rx-na   { display:inline-flex;align-items:center;gap:4px;background:#f1f5f9;border:1px solid #e2e8f0;color:#94a3b8;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-ip      { display:inline-flex;align-items:center;gap:4px;background:#f0f9ff;border:1px solid #bae6fd;color:#0284c7;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-user    { display:inline-flex;align-items:center;gap:4px;background:#eff6ff;border:1px solid #bfdbfe;color:#0271c6;font-size:12px;font-weight:700;border-radius:6px;padding:2px 9px; }
.dd-badge-mac     { display:inline-flex;align-items:center;gap:4px;background:#f8fafc;border:1px solid #e2e8f0;color:#475569;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-temp-ok   { display:inline-flex;align-items:center;gap:4px;background:#f0fdf4;border:1px solid #bbf7d0;color:#16a34a;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-temp-warm { display:inline-flex;align-items:center;gap:4px;background:#fef3c7;border:1px solid #fde68a;color:#d97706;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-temp-hot  { display:inline-flex;align-items:center;gap:4px;background:#fee2e2;border:1px solid #fecaca;color:#dc2626;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-badge-pon-gpon  { display:inline-flex;align-items:center;gap:4px;background:#1d4ed8;color:#fff;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px; }
.dd-badge-pon-epon  { display:inline-flex;align-items:center;gap:4px;background:#ede9fe;border:1px solid #ddd6fe;color:#7c3aed;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px; }
.dd-badge-pon-eth   { display:inline-flex;align-items:center;gap:4px;background:#ffedd5;border:1px solid #fed7aa;color:#c2410c;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px; }
.dd-badge-plain   { display:inline-flex;align-items:center;gap:4px;background:#f8fafc;border:1px solid #e2e8f0;color:#334155;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px; }
.dd-badge-device  { display:inline-flex;align-items:center;gap:5px;background:#f5f3ff;border:1px solid #ddd6fe;color:#7c3aed;font-size:12px;font-weight:700;border-radius:6px;padding:3px 9px; }
.dd-badge-iface   { display:inline-flex;align-items:center;gap:4px;background:#f8fafc;border:1px solid #e2e8f0;color:#475569;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.dd-mono { font-family: 'DM Mono', monospace; font-size: 11px; }
.dd-muted { color: #94a3b8; font-size: 11px; }

/* ---- WiFi Info rows ---- */
.dd-wifi-row { display: flex; align-items: center; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f1f5f9; }
.dd-wifi-row:last-child { border-bottom: none; }
.dd-wifi-label { font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em; }
.dd-wifi-value { font-size: 13px; font-weight: 500; color: #334155; text-align: right; }
.dd-pass-group { display: flex; align-items: center; gap: 6px; }
.dd-device-badge { display: inline-flex; align-items: center; gap: 4px; background: #eff6ff; border: 1px solid #bfdbfe; color: #0271c6; font-size: 11px; font-weight: 700; border-radius: 6px; padding: 2px 8px; }

/* ---- WiFi Band Cards v2 (2×SSID cards) ---- */
.dd-wifi-bands { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.dd-band-card { position: relative; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px 14px 10px 16px; background: #fff; overflow: hidden; transition: border-color 0.15s; }
.dd-band-card::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; }
.dd-band-card.dd-band-2g::before { background: linear-gradient(to bottom, #3b82f6, #1d4ed8); }
.dd-band-card.dd-band-5g::before { background: linear-gradient(to bottom, #a855f7, #7c3aed); }
.dd-band-card.dd-band-2g { background: linear-gradient(135deg, #fff 0%, #eff6ff 100%); }
.dd-band-card.dd-band-5g { background: linear-gradient(135deg, #fff 0%, #f5f3ff 100%); }
.dd-band-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; gap: 6px; flex-wrap: wrap; }
.dd-band-tag { display: inline-flex; align-items: center; gap: 4px; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 5px; letter-spacing: 0.04em; }
.dd-band-tag-2g { background: #dbeafe; color: #1d4ed8; }
.dd-band-tag-5g { background: #ede9fe; color: #7c3aed; }
.dd-band-status { display: inline-flex; align-items: center; gap: 5px; font-size: 10px; font-weight: 700; padding: 2px 7px; border-radius: 5px; }
.dd-band-status-on { background: #dcfce7; color: #15803d; }
.dd-band-status-off { background: #f1f5f9; color: #94a3b8; }
.dd-band-status-dot { width: 5px; height: 5px; border-radius: 50%; background: currentColor; }
.dd-band-ssid { font-size: 14px; font-weight: 700; color: #0f172a; margin-bottom: 6px; word-break: break-all; line-height: 1.25; }
.dd-band-ssid.dd-band-ssid-na { color: #cbd5e1; font-style: italic; font-weight: 500; }
.dd-band-rows { display: flex; flex-direction: column; gap: 2px; }
.dd-band-row { display: flex; align-items: center; gap: 7px; padding: 5px 0; border-top: 1px dashed #e2e8f0; }
.dd-band-row-icon { width: 22px; height: 22px; border-radius: 6px; background: rgba(255,255,255,0.7); display: flex; align-items: center; justify-content: center; color: #64748b; flex-shrink: 0; }
.dd-band-row-val { font-family: 'DM Mono', ui-monospace, monospace; font-size: 11px; color: #334155; font-weight: 600; flex: 1; min-width: 0; word-break: break-all; }
.dd-band-row-val-text { font-family: inherit; font-size: 12px; }
.dd-band-eye-btn { background: transparent; border: none; cursor: pointer; padding: 3px; color: #94a3b8; display: inline-flex; border-radius: 5px; transition: all 0.15s; flex-shrink: 0; }
.dd-band-eye-btn:hover { background: rgba(0,0,0,0.04); color: #475569; }

/* ---- Tags ---- */
.dd-tags-wrap { display: flex; flex-wrap: wrap; gap: 6px; }
.dd-tag { position: relative; display: inline-flex; align-items: center; gap: 5px; background: #fff; border: 1px solid #e2e8f0; color: #334155; font-size: 12px; font-weight: 600; border-radius: 7px; padding: 4px 11px 4px 12px; box-shadow: 0 1px 2px rgba(15,23,42,0.04); transition: all 0.18s ease; }
.dd-tag::before { content: ''; position: absolute; left: 0; top: 4px; bottom: 4px; width: 2px; border-radius: 2px; }
.dd-tag:hover { transform: translateY(-1px); box-shadow: 0 3px 8px rgba(15,23,42,0.08); border-color: #cbd5e1; }
.dd-tag svg { flex-shrink: 0; }

/* Default/user tag — biru */
.dd-tag { background: linear-gradient(135deg, #fff 0%, #eff6ff 100%); color: #0271c6; border-color: #bfdbfe; }
.dd-tag::before { background: linear-gradient(to bottom, #3b82f6, #1d4ed8); }

/* Location tag — hijau */
.dd-tag.dd-tag-loc { background: linear-gradient(135deg, #fff 0%, #f0fdf4 100%); color: #16a34a; border-color: #bbf7d0; }
.dd-tag.dd-tag-loc::before { background: linear-gradient(to bottom, #22c55e, #15803d); }

.dd-no-tag { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; color: #94a3b8; font-style: italic; font-weight: 500; background: #f8fafc; border: 1px dashed #e2e8f0; border-radius: 7px; padding: 6px 12px; }
.dd-no-tag svg { opacity: 0.6; }

/* ---- Tags Cards v2 (F1 — paralel band card) ---- */
.dd-tag-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.dd-tag-card { position: relative; border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px 12px 10px 14px; background: #fff; overflow: hidden; transition: border-color 0.15s, transform 0.15s; min-height: 62px; display: flex; flex-direction: column; justify-content: center; }
.dd-tag-card:hover { transform: translateY(-1px); box-shadow: 0 3px 8px rgba(15,23,42,0.06); }
.dd-tag-card::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; }
.dd-tag-card.dd-tag-card-user { background: linear-gradient(135deg, #fff 0%, #eff6ff 100%); }
.dd-tag-card.dd-tag-card-user::before { background: linear-gradient(to bottom, #3b82f6, #1d4ed8); }
.dd-tag-card.dd-tag-card-loc { background: linear-gradient(135deg, #fff 0%, #f0fdf4 100%); }
.dd-tag-card.dd-tag-card-loc::before { background: linear-gradient(to bottom, #22c55e, #15803d); }
.dd-tag-card.dd-tag-card-extra { background: linear-gradient(135deg, #fff 0%, #fff7ed 100%); }
.dd-tag-card.dd-tag-card-extra::before { background: linear-gradient(to bottom, #f59e0b, #d97706); }
.dd-tag-card-head { display: flex; align-items: center; gap: 6px; margin-bottom: 5px; }
.dd-tag-card-chip { display: inline-flex; align-items: center; gap: 4px; font-size: 10px; font-weight: 800; padding: 2px 7px; border-radius: 5px; letter-spacing: 0.04em; }
.dd-tag-card-chip-user { background: #dbeafe; color: #1d4ed8; }
.dd-tag-card-chip-loc { background: #dcfce7; color: #15803d; }
.dd-tag-card-chip-extra { background: #fef3c7; color: #d97706; }
.dd-tag-card-value { font-size: 14px; font-weight: 700; color: #0f172a; line-height: 1.25; word-break: break-word; }
.dd-tag-card-value.dd-tag-card-empty { color: #cbd5e1; font-style: italic; font-weight: 500; font-size: 13px; }

/* Tags section di dalam WiFi card */
.dd-tags-section { margin-top: 14px; padding-top: 12px; border-top: 1px dashed #e2e8f0; }
.dd-tags-section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }

/* ---- Toggle ---- */
.dd-toggle-row { display: flex; align-items: center; gap: 10px; }
.dd-toggle { position: relative; display: inline-block; width: 44px; height: 24px; flex-shrink: 0; }
.dd-toggle input { display: none; }
.dd-toggle-track { position: absolute; inset: 0; background: #e2e8f0; border-radius: 12px; cursor: pointer; transition: background 0.2s; }
.dd-toggle input:checked + .dd-toggle-track { background: #0271c6; }
.dd-toggle-thumb { position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background: white; border-radius: 50%; transition: left 0.2s; pointer-events: none; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
.dd-toggle input:checked ~ .dd-toggle-thumb { left: 22px; }
.dd-toggle-lbl { font-size: 12px; color: #64748b; }

/* ---- Admin grid ---- */
.dd-admin-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.dd-admin-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; }
.dd-admin-item { background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 10px; padding: 12px 14px; }
.dd-admin-item label { font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px; }

/* ---- Admin Role Cards v2 ---- */
.dd-role-stack { display: flex; flex-direction: column; gap: 10px; }
.dd-role-card { position: relative; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px 14px 12px 16px; background: #fff; overflow: hidden; }
.dd-role-card::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; }
.dd-role-card.dd-role-super::before { background: linear-gradient(to bottom, #dc2626, #b91c1c); }
.dd-role-card.dd-role-user::before { background: linear-gradient(to bottom, #0271c6, #0369a1); }
.dd-role-card.dd-role-super { background: linear-gradient(135deg, #fff 0%, #fef2f2 100%); }
.dd-role-card.dd-role-user { background: linear-gradient(135deg, #fff 0%, #eff6ff 100%); }
.dd-role-head { display: flex; align-items: center; gap: 7px; margin-bottom: 8px; }
.dd-role-chip { display: inline-flex; align-items: center; gap: 4px; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 5px; letter-spacing: 0.04em; }
.dd-role-chip-super { background: #fee2e2; color: #b91c1c; }
.dd-role-chip-user { background: #dbeafe; color: #0271c6; }
.dd-role-rows { display: flex; flex-direction: column; gap: 2px; }
.dd-role-row { display: flex; align-items: center; gap: 7px; padding: 5px 0; }
.dd-role-row + .dd-role-row { border-top: 1px dashed #e2e8f0; }
.dd-role-row-icon { width: 22px; height: 22px; border-radius: 6px; background: rgba(0,0,0,0.04); display: flex; align-items: center; justify-content: center; color: #64748b; flex-shrink: 0; }
.dd-role-row-val { font-family: 'DM Mono', ui-monospace, monospace; font-size: 12px; color: #0f172a; font-weight: 600; flex: 1; min-width: 0; word-break: break-all; }
.dd-role-row-val.dd-role-empty { color: #cbd5e1; font-style: italic; font-weight: 500; }
.dd-role-copy { background: transparent; border: 1px solid transparent; cursor: pointer; padding: 3px 7px; color: #94a3b8; display: inline-flex; align-items: center; gap: 4px; border-radius: 5px; transition: all 0.15s; font-size: 10px; font-weight: 700; flex-shrink: 0; }
.dd-role-copy:hover { background: rgba(0,0,0,0.04); color: #475569; border-color: #e2e8f0; }
.dd-role-copy.copied { background: #dcfce7; color: #15803d; border-color: #86efac; }
.dd-admin-item span { font-size: 13px; font-weight: 600; color: #0f172a; }

/* ---- Connected Users table ---- */
.dd-table-wrap { overflow-x: auto; }
.dd-table { width: 100%; border-collapse: collapse; font-family: 'DM Sans', sans-serif; font-size: 12px; }
.dd-table thead tr { background: #f8fafc; border-bottom: 2px solid #e2e8f0; }
.dd-table thead th { padding: 9px 12px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #94a3b8; text-align: left; white-space: nowrap; }
.dd-table tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.1s; }
.dd-table tbody tr:last-child { border-bottom: none; }
.dd-table tbody tr:hover { background: #f8fafc; }
.dd-table tbody td { padding: 9px 12px; color: #334155; }
.dd-conn { display: inline-flex; align-items: center; padding: 2px 7px; border-radius: 20px; font-size: 10px; font-weight: 700; }
.dd-conn-24 { background: #dbeafe; color: #1d4ed8; }
.dd-conn-5  { background: #ede9fe; color: #7c3aed; }
.dd-conn-lan { background: #dcfce7; color: #15803d; }
.dd-conn-unk { background: #f1f5f9; color: #64748b; }

/* ---- Connected Users v2 (Summary Stats + Grouped Cards) ---- */
.dd-users-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; padding: 14px 18px 12px; border-bottom: 1px solid #f1f5f9; background: #fafcff; }
.dd-user-stat { position: relative; display: flex; align-items: center; gap: 10px; padding: 10px 12px; background: #fff; border: 1px solid #e2e8f0; border-radius: 9px; overflow: hidden; transition: transform 0.15s, border-color 0.15s; }
.dd-user-stat:hover { transform: translateY(-1px); border-color: #cbd5e1; }
.dd-user-stat::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; }
.dd-user-stat-24::before { background: linear-gradient(to bottom, #3b82f6, #1d4ed8); }
.dd-user-stat-5g::before { background: linear-gradient(to bottom, #a855f7, #7c3aed); }
.dd-user-stat-lan::before { background: linear-gradient(to bottom, #22c55e, #15803d); }
.dd-user-stat-unk::before { background: linear-gradient(to bottom, #94a3b8, #64748b); }
.dd-user-stat-icon { width: 28px; height: 28px; border-radius: 7px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.dd-user-stat-24 .dd-user-stat-icon { background: #dbeafe; color: #1d4ed8; }
.dd-user-stat-5g .dd-user-stat-icon { background: #ede9fe; color: #7c3aed; }
.dd-user-stat-lan .dd-user-stat-icon { background: #dcfce7; color: #15803d; }
.dd-user-stat-unk .dd-user-stat-icon { background: #f1f5f9; color: #64748b; }
.dd-user-stat-body { min-width: 0; flex: 1; }
.dd-user-stat-num { font-size: 18px; font-weight: 800; color: #0f172a; line-height: 1; }
.dd-user-stat-lbl { font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 3px; }

/* User group section */
.dd-user-groups { padding: 14px 18px; }
.dd-user-group { margin-bottom: 16px; }
.dd-user-group:last-child { margin-bottom: 0; }
.dd-user-group-title { display: flex; align-items: center; gap: 8px; margin-bottom: 10px; font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.06em; }
.dd-user-group-title::after { content: ''; flex: 1; height: 1px; background: linear-gradient(to right, #e2e8f0, transparent); }
.dd-user-group-count { display: inline-flex; align-items: center; justify-content: center; min-width: 20px; height: 18px; padding: 0 6px; border-radius: 9px; font-size: 10px; font-weight: 700; }
.dd-user-group-24 .dd-user-group-count { background: #dbeafe; color: #1d4ed8; }
.dd-user-group-5g .dd-user-group-count { background: #ede9fe; color: #7c3aed; }
.dd-user-group-lan .dd-user-group-count { background: #dcfce7; color: #15803d; }
.dd-user-group-unk .dd-user-group-count { background: #f1f5f9; color: #64748b; }

/* User item (horizontal card) */
.dd-user-items { display: flex; flex-direction: column; gap: 6px; }
.dd-user-item { position: relative; display: flex; align-items: center; gap: 12px; padding: 10px 14px 10px 16px; background: #fff; border: 1px solid #e2e8f0; border-radius: 9px; transition: all 0.15s; }
.dd-user-item:hover { border-color: #cbd5e1; background: #fafcff; transform: translateX(2px); }
.dd-user-item::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; border-radius: 9px 0 0 9px; }
.dd-user-group-24 .dd-user-item::before { background: #3b82f6; }
.dd-user-group-5g .dd-user-item::before { background: #a855f7; }
.dd-user-group-lan .dd-user-item::before { background: #22c55e; }
.dd-user-group-unk .dd-user-item::before { background: #94a3b8; }
.dd-user-avatar { width: 36px; height: 36px; border-radius: 9px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: linear-gradient(135deg, #f1f5f9, #e2e8f0); color: #475569; }
.dd-user-group-24 .dd-user-avatar { background: linear-gradient(135deg, #eff6ff, #dbeafe); color: #1d4ed8; }
.dd-user-group-5g .dd-user-avatar { background: linear-gradient(135deg, #f5f3ff, #ede9fe); color: #7c3aed; }
.dd-user-group-lan .dd-user-avatar { background: linear-gradient(135deg, #f0fdf4, #dcfce7); color: #15803d; }
.dd-user-body { min-width: 0; flex: 1; display: flex; flex-direction: column; gap: 5px; }
.dd-user-name { font-size: 13px; font-weight: 700; color: #0f172a; line-height: 1.2; word-break: break-word; }
.dd-user-name.dd-user-name-unknown { color: #94a3b8; font-style: italic; font-weight: 500; }
.dd-user-meta { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
.dd-user-meta .dd-badge-ip, .dd-user-meta .dd-badge-mac { font-size: 10px; padding: 2px 7px; gap: 4px; }
.dd-user-meta .dd-badge-ip svg, .dd-user-meta .dd-badge-mac svg { flex-shrink: 0; }
.dd-user-side { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }

/* ---- User mobile cards ---- */
.dd-user-card { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px; margin-bottom: 8px; }
.dd-user-card:last-child { margin-bottom: 0; }
.dd-user-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
.dd-user-row { display: flex; justify-content: space-between; font-size: 12px; padding: 3px 0; border-bottom: 1px solid #f1f5f9; }
.dd-user-row:last-child { border-bottom: none; }
.dd-user-key { font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; }

/* ---- Layout ---- */
.dd-section-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
.dd-count { display: inline-flex; align-items: center; justify-content: center; min-width: 20px; height: 20px; background: #0271c6; color: white; border-radius: 10px; font-size: 11px; font-weight: 700; padding: 0 6px; }
.dd-empty { padding: 36px 24px; text-align: center; font-family: 'DM Sans', sans-serif; }
.dd-empty i { font-size: 36px; color: #e2e8f0; display: block; margin-bottom: 10px; }
.dd-empty p { font-size: 13px; color: #94a3b8; margin: 0; }

/* ---- Modal engine ---- */
@keyframes ddModalIn   { from{opacity:0;transform:translateY(-12px) scale(0.98)} to{opacity:1;transform:translateY(0) scale(1)} }
@keyframes ddSlideUp   { from{transform:translateY(100%);opacity:0.6} to{transform:translateY(0);opacity:1} }
@keyframes ddSpin      { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
@keyframes ddCheckCircle { from{stroke-dashoffset:166} to{stroke-dashoffset:0} }
@keyframes ddCheckMark   { from{stroke-dashoffset:48}  to{stroke-dashoffset:0} }
@keyframes ddCheckScale  { 0%{transform:scale(0.8);opacity:0} 60%{transform:scale(1.1)} 100%{transform:scale(1);opacity:1} }
.dd-modal-spinner { display:inline-block;width:48px;height:48px;border:3px solid #e2e8f0;border-top-color:#0271c6;border-radius:50%;animation:ddSpin 0.7s linear infinite; }
.dd-check-svg { width:72px;height:72px;animation:ddCheckScale 0.4s cubic-bezier(0.34,1.56,0.64,1) forwards; }
.dd-check-circle { fill:none;stroke:#16a34a;stroke-width:4;stroke-dasharray:166;stroke-dashoffset:166;stroke-linecap:round;animation:ddCheckCircle 0.5s ease-in-out 0.1s forwards; }
.dd-check-mark   { fill:none;stroke:#16a34a;stroke-width:5;stroke-dasharray:48;stroke-dashoffset:48;stroke-linecap:round;stroke-linejoin:round;animation:ddCheckMark 0.35s ease-in-out 0.5s forwards; }

/* ---- Sheet/Form Modal — center di desktop, slide-up di mobile ---- */
#ddSheetOverlay { position:fixed;inset:0;z-index:9994;background:rgba(15,23,42,0.55);backdrop-filter:blur(3px);display:none;align-items:center;justify-content:center;padding:16px; }
#ddSheetCard { background:white;border-radius:16px;width:100%;max-width:520px;max-height:90vh;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.2);display:flex;flex-direction:column;animation:ddModalIn 0.25s cubic-bezier(0.34,1.56,0.64,1); }
.dd-sheet-header { padding:18px 22px;display:flex;align-items:center;justify-content:space-between;background:linear-gradient(135deg,#0271c6,#0359a0);flex-shrink:0; }
.dd-sheet-title { font-size:15px;font-weight:700;color:white;font-family:'DM Sans',sans-serif;display:flex;align-items:center;gap:8px; }
.dd-sheet-close { width:30px;height:30px;border-radius:8px;border:none;background:rgba(255,255,255,0.2);color:white;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background 0.15s;flex-shrink:0; }
.dd-sheet-close:hover { background:rgba(255,255,255,0.3); }
.dd-sheet-body { padding:20px 22px;flex:1;overflow-y:auto; }
.dd-sheet-footer { padding:14px 22px;border-top:1px solid #f1f5f9;display:flex;gap:8px;justify-content:flex-end;background:#fafcff;flex-shrink:0; }

/* ---- Notification modal (center) ---- */
#ddModalOverlay { position:fixed;inset:0;z-index:9995;background:rgba(15,23,42,0.55);backdrop-filter:blur(3px);display:none;align-items:center;justify-content:center;padding:16px; }
#ddModalCard { background:white;border-radius:16px;width:100%;max-width:420px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.2);display:flex;flex-direction:column;animation:ddModalIn 0.25s cubic-bezier(0.34,1.56,0.64,1); }
#ddModalHeader { padding:18px 22px;display:flex;align-items:center;justify-content:space-between;flex-shrink:0; }
#ddModalTitle { font-size:15px;font-weight:700;font-family:'DM Sans',sans-serif;display:flex;align-items:center;gap:8px;color:white; }
#ddModalClosebtn { width:30px;height:30px;border-radius:8px;border:none;background:rgba(255,255,255,0.2);color:white;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;transition:background 0.15s;flex-shrink:0; }
#ddModalBody { padding:22px;font-family:'DM Sans',sans-serif; }
#ddModalFooter { padding:14px 22px;border-top:1px solid #f1f5f9;display:flex;gap:8px;justify-content:flex-end;background:#fafcff;flex-shrink:0; }

/* ===================== TABLET ===================== */
@media (max-width:991px) {
    .dd-info-grid { grid-template-columns: repeat(2, 1fr); }
    .dd-metric-grid { grid-template-columns: repeat(3, 1fr); }
    .dd-identity-hero { padding: 14px 14px; gap: 12px; }
    .dd-identity-icon { width: 44px; height: 44px; border-radius: 10px; }
    .dd-identity-title { font-size: 14px; }
    .dd-identity-id { max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
}

/* ===================== MOBILE ===================== */
@media (max-width: 767px) {
    .bk-card-header { padding: 12px 14px; flex-wrap: nowrap; }
    .bk-card-body { padding: 12px 14px; }
    /* Info grid mobile: 2 kolom, layout horizontal compact */
    .dd-info-grid { grid-template-columns: 1fr 1fr; gap: 6px; padding: 8px; }
    .dd-info-item { padding: 8px 10px; flex-direction: row; align-items: center; gap: 8px; }
    .dd-info-icon { width: 26px; height: 26px; border-radius: 7px; font-size: 11px; flex-shrink: 0; }
    .dd-info-label { font-size: 9px; margin-bottom: 2px; }
    .dd-info-value { font-size: 10px; margin-top: 0; word-break: break-all; }
    /* Last inform full width */
    .dd-info-item.dd-info-last { grid-column: 1 / -1; }

    /* Device Info redesign v2 — mobile tuning */
    .dd-identity-hero { padding: 12px; gap: 10px; border-radius: 10px; margin-bottom: 14px; flex-wrap: nowrap; align-items: center; }
    .dd-identity-icon { width: 38px; height: 38px; border-radius: 9px; }
    .dd-identity-icon svg { width: 20px; height: 20px; }
    .dd-identity-title { font-size: 13px; gap: 5px; flex-wrap: nowrap; overflow: hidden; }
    .dd-identity-id-row { gap: 6px; margin-top: 6px; }
    .dd-identity-id { font-size: 10px; padding: 3px 8px; flex: 1; min-width: 0; }
    .dd-identity-copy { padding: 3px 7px; font-size: 10px; }
    .dd-identity-copy .dd-identity-copy-label { display: none; }
    .dd-identity-copy svg { width: 12px; height: 12px; }
    .dd-identity-tags { display: none; }

    .dd-metric-grid { grid-template-columns: 1fr 1fr; gap: 8px; }
    .dd-metric-card { padding: 10px 11px; gap: 9px; border-radius: 9px; align-items: flex-start; }
    .dd-metric-card.dd-metric-wide { grid-column: 1 / -1; }
    .dd-metric-icon { width: 28px; height: 28px; border-radius: 7px; }
    .dd-metric-icon svg { width: 14px; height: 14px; }
    .dd-metric-label { font-size: 9px; letter-spacing: 0.06em; }
    .dd-metric-value { font-size: 12px; margin-top: 3px; }
    .dd-metric-section-title { font-size: 10px; margin-bottom: 8px; }
    .dd-metric-section { margin-bottom: 14px; }
    .dd-section-row { grid-template-columns: 1fr; gap: 12px; }
    .dd-admin-grid { grid-template-columns: 1fr; gap: 8px; }
    .dd-admin-grid-4 { grid-template-columns: 1fr 1fr; gap: 8px; }

    /* WiFi band cards mobile: stack 1 kolom */
    .dd-wifi-bands { grid-template-columns: 1fr; gap: 8px; }
    .dd-band-card { padding: 10px 12px 10px 14px; }
    .dd-band-ssid { font-size: 13px; }
    .dd-band-row-val { font-size: 10px; }

    /* Tag cards mobile: stack 1 kolom */
    .dd-tag-grid { grid-template-columns: 1fr; gap: 8px; }
    .dd-tag-card { padding: 9px 12px 9px 13px; min-height: 54px; }
    .dd-tag-card-value { font-size: 13px; }
    .dd-table-wrap { display: none; }
    .dd-users-mobile { display: block !important; }

    /* Connected Users v2 mobile tuning */
    .dd-users-stats { grid-template-columns: 1fr 1fr; gap: 6px; padding: 10px 12px 8px; }
    .dd-user-stat { padding: 8px 10px; gap: 8px; }
    .dd-user-stat-icon { width: 24px; height: 24px; border-radius: 6px; }
    .dd-user-stat-num { font-size: 16px; }
    .dd-user-stat-lbl { font-size: 8px; }
    .dd-user-groups { padding: 12px; }
    .dd-user-group { margin-bottom: 12px; }
    .dd-user-group-title { font-size: 10px; margin-bottom: 8px; }
    .dd-user-item { padding: 9px 12px 9px 14px; gap: 10px; }
    .dd-user-avatar { width: 32px; height: 32px; border-radius: 8px; }
    .dd-user-name { font-size: 12px; }
    .dd-user-meta { font-size: 10px; gap: 6px; }
    /* Action bar mobile: 3 tombol rata, ikon bulat + teks horizontal, border pemisah */
    .dd-action-bar { justify-content: stretch; padding: 0; gap: 0; }
    .dd-action-bar-divider { display: none; }
    .dd-back-desktop { display: none !important; }
    .dd-back-header { display: flex; }

    /* Device Hero Header v2 — mobile tuning */
    .dd-hero { padding: 14px 14px; gap: 12px; }
    .dd-hero-avatar { width: 52px; height: 52px; border-radius: 13px; }
    .dd-hero-avatar svg { width: 26px; height: 26px; }
    .dd-hero-user { font-size: 16px; gap: 6px; }
    .dd-hero-row1 { gap: 7px; margin-bottom: 3px; }
    .dd-hero-row2 { gap: 6px; margin-bottom: 6px; }
    .dd-hero-model { font-size: 12px; }
    .dd-hero-actions-desktop { display: none; }
    .dd-pill-btn { flex: 1; flex-direction: row; gap: 7px; height: auto; padding: 12px 4px; border-radius: 0; border: none !important; border-right: 1px solid #f1f5f9 !important; background: transparent !important; font-size: 12px; font-weight: 600; justify-content: center; }
    .dd-pill-btn:last-of-type, .dd-pill-btn.back { border-right: none !important; }
    .dd-pill-circle { display: flex; }
    #ddModalOverlay { align-items: flex-end !important; padding: 0 !important; }
    #ddModalCard { border-radius: 20px 20px 0 0 !important; max-width: 100% !important; animation: ddSlideUp 0.32s cubic-bezier(0.32,0.72,0,1) !important; }
    #ddModalFooter { flex-direction: column-reverse; }
    #ddModalFooter .bk-btn { width:100%;justify-content:center; }
    /* Sheet slide-up di mobile */
    #ddSheetOverlay { align-items: flex-end !important; padding: 0 !important; }
    #ddSheetCard { border-radius: 20px 20px 0 0 !important; max-width: 100% !important; max-height: 85vh !important; animation: ddSlideUp 0.32s cubic-bezier(0.32,0.72,0,1) !important; }
    .dd-sheet-footer { flex-direction: column-reverse; }
    .dd-sheet-footer .bk-btn { width:100%;justify-content:center; }
    .dd-sheet-body { padding:16px; }
    .bk-card-subtitle { display: none; }
}
@media (min-width: 768px) { .dd-users-mobile { display: none !important; } }

/* ---- Offline Section Overlay (body only, header stays visible) ---- */
.dd-card-offline .bk-card-body,
.dd-card-offline .dd-users-stats { position: relative; }
.dd-card-offline .bk-card-body::after,
.dd-card-offline .dd-users-stats::after {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 10;
    background: rgba(254,242,242,0.35);
    backdrop-filter: blur(0.5px);
    pointer-events: all;
    border-radius: 0 0 12px 12px;
}
.dd-card-offline .dd-offline-badge {
    position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 11;
    display: flex; flex-direction: column; align-items: center; gap: 4px;
    pointer-events: none;
}
.dd-card-offline .dd-offline-badge i { font-size: 24px; color: #dc2626; opacity: 0.85; }
.dd-card-offline .dd-offline-badge span { font-size: 11px; font-weight: 600; color: #dc2626; opacity: 0.9; }
/* Header offline: gradasi putih → merah muda (seperti hero) */
.dd-card-offline .bk-card-header { background: linear-gradient(135deg, #fff 0%, #fef2f2 55%, #fee2e2 100%); border-bottom-color: #fecaca; }
.dd-card-offline .bk-card-header .bk-card-icon { background: linear-gradient(135deg, #fee2e2, #fecaca) !important; }
.dd-card-offline .bk-card-header .bk-card-icon svg path,
.dd-card-offline .bk-card-header .bk-card-icon svg circle,
.dd-card-offline .bk-card-header .bk-card-icon svg line,
.dd-card-offline .bk-card-header .bk-card-icon svg polyline,
.dd-card-offline .bk-card-header .bk-card-icon svg rect { stroke: #dc2626; }
.dd-card-offline .bk-card-header .bk-card-icon svg circle[fill] { fill: #dc2626; }
.dd-card-offline .bk-card-header .bk-card-title { color: #dc2626; }
.dd-card-offline .bk-card-header .bk-card-subtitle { color: #f87171; }
.dd-card-offline .bk-card-header .dd-count { background: #fee2e2; color: #dc2626; }
/* Disable edit/add buttons when offline (keep refresh enabled) */
.dd-card-offline .bk-card-header .dd-action-btn.edit,
.dd-card-offline .bk-card-header button[onclick*="Add"],
.dd-card-offline .bk-card-header button[onclick*="add"],
.dd-card-offline .bk-card-header button[onclick*="Open"],
.dd-card-offline .bk-card-header button[onclick*="Sheet"] {
    opacity: 0.4; pointer-events: none; cursor: not-allowed;
}
/* Disable summon/reboot buttons in hero when offline (keep refresh/back) */

{/literal}
</style>

<!-- ===================== DEVICE HEADER CARD (Hero v2 — Opsi H1) ===================== -->
<div class="bk-card">

    {* ============== HERO ============== *}
    <div class="dd-hero{if $device.status != 'online'} dd-hero-offline{/if}">
        {* Avatar besar dengan status indicator pulse *}
        <div class="dd-hero-avatar">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="14" width="20" height="7" rx="2"/>
                <circle cx="6" cy="17.5" r="1" fill="currentColor"/>
                <circle cx="10" cy="17.5" r="1" fill="currentColor"/>
                <path d="M12 14V10"/>
                <path d="M8.5 7.5C9.5 6.5 10.7 6 12 6s2.5.5 3.5 1.5"/>
                <path d="M6 5C7.6 3.4 9.7 2.5 12 2.5s4.4.9 6 2.5"/>
            </svg>
            <span class="dd-hero-avatar-pulse">
                <span class="dd-hero-avatar-pulse-dot {if $device.status == 'online'}on{else}off{/if}"></span>
            </span>
        </div>

        {* Body info stack *}
        <div class="dd-hero-body">
            {* Row 1: Username + mobile back button (status dot sudah ada di avatar pulse) *}
            <div class="dd-hero-row1">
                <span class="dd-hero-user">
                    <svg class="dd-hero-user-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                    {$device.pppoe_username|default:$device.ppp_username|default:'Unknown Device'}
                </span>

                {* Mobile back button — pushed to right *}
                <a href="{$_url}plugin/genieacs_devices" class="dd-back-header" title="Back" style="margin-left:auto;">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><polyline points="15 18 9 12 15 6" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Back
                </a>
            </div>

            {* Row 2: Vendor · model *}
            {if isset($device.vendor) || isset($device.manufacturer) || isset($device.model)}
            <div class="dd-hero-row2">
                {assign var="h_vendor" value=$device.vendor|default:$device.manufacturer|default:''}
                {if $h_vendor}
                    {assign var="h_vendor_parts" value=" "|explode:$h_vendor}
                    {assign var="h_vendor_short" value=$h_vendor_parts[0]}
                    <span class="dd-hero-model"><span class="dd-hero-model-vendor">{$h_vendor_short}</span>{if isset($device.model)} {$device.model}{/if}</span>
                {elseif isset($device.model)}
                    <span class="dd-hero-model">{$device.model}</span>
                {/if}
            </div>
            {/if}
        </div>

        {* Desktop action cluster — right of hero *}
        <div class="dd-hero-actions-desktop">
            <button class="dd-pill-btn refresh" onclick="ddRefreshDevice()" title="Refresh Device">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M21 12a9 9 0 1 1-2.1-5.7" stroke="#0271c6" stroke-width="2" stroke-linecap="round"/><polyline points="21 3 21 9 15 9" stroke="#0271c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Refresh
            </button>
            <button class="dd-pill-btn summon" onclick="ddSummonDevice()" title="Summon Device">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.73 21a2 2 0 0 1-3.46 0" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/></svg>
                Summon
            </button>
            <button class="dd-pill-btn reboot" onclick="ddRebootDevice()" title="Reboot Device">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18.36 6.64A9 9 0 1 1 5.64 6.64" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/><line x1="12" y1="2" x2="12" y2="12" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/></svg>
                Reboot
            </button>
            <a href="{$_url}plugin/genieacs_devices" class="dd-pill-btn back" title="Back to Devices">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><polyline points="15 18 9 12 15 6" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Back
            </a>
        </div>
    </div>

    {* Mobile action bar — icon horizontal bar (desktop hidden via media query) *}
    <div class="dd-action-bar">
        <button class="dd-pill-btn refresh" onclick="ddRefreshDevice()" title="Refresh Device">
            <span class="dd-pill-circle" style="background:#eff6ff;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M21 12a9 9 0 1 1-2.1-5.7" stroke="#0271c6" stroke-width="2" stroke-linecap="round"/><polyline points="21 3 21 9 15 9" stroke="#0271c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            Refresh
        </button>
        <div class="dd-action-bar-divider"></div>
        <button class="dd-pill-btn summon" onclick="ddSummonDevice()" title="Summon Device">
            <span class="dd-pill-circle" style="background:#f0fdf4;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.73 21a2 2 0 0 1-3.46 0" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/></svg>
            </span>
            Summon
        </button>
        <div class="dd-action-bar-divider"></div>
        <button class="dd-pill-btn reboot" onclick="ddRebootDevice()" title="Reboot Device">
            <span class="dd-pill-circle" style="background:#fee2e2;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18.36 6.64A9 9 0 1 1 5.64 6.64" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/><line x1="12" y1="2" x2="12" y2="12" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/></svg>
            </span>
            Reboot
        </button>
    </div>
</div>

<!-- ===================== DEVICE INFORMATION ===================== -->
<div class="bk-card">
    <div class="bk-card-header">
        <div class="bk-card-icon" style="background:linear-gradient(135deg,#dbeafe,#bfdbfe);">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#0271c6" stroke-width="2"/><line x1="12" y1="8" x2="12" y2="12" stroke="#0271c6" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="16" r="1" fill="#0271c6"/></svg>
        </div>
        <div>
            <div class="bk-card-title">Device Information</div>
            <div class="bk-card-subtitle">Parameters retrieved from the ACS server</div>
        </div>
    </div>
    <div class="bk-card-body">

        {* ============== HERO STRIP: Identity (vendor · model · device ID) ============== *}
        <div class="dd-identity-hero{if $device.status != 'online'} dd-identity-offline{/if}">
            <div class="dd-identity-icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                    <path d="M6 11h.01M10 11h.01M14 11h.01M18 11h.01"/>
                    <path d="M6 15h8"/>
                    <path d="M12 7V3"/>
                    <circle cx="12" cy="3" r="1"/>
                </svg>
            </div>
            <div class="dd-identity-main">
                <div class="dd-identity-title">
                    {assign var="vendor_full" value=$device.vendor|default:$device.manufacturer|default:'Unknown'}
                    <span class="dd-identity-vendor" id="ddVendorShort" title="{$vendor_full}">{$vendor_full}</span>
                    {if isset($device.model)}<span class="dd-identity-sep">·</span><span class="dd-identity-model">{$device.model}</span>{/if}
                </div>
                <div class="dd-identity-id-row">
                    <span class="dd-identity-id" id="ddHeroId" title="{$device_id_raw}">{$device_id_raw}</span>
                    <button type="button" class="dd-identity-copy" onclick="ddCopyDeviceId(this)" title="Copy device ID">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        <span class="dd-identity-copy-label">Copy</span>
                    </button>
                </div>
            </div>
        </div>

        {* ============== SECTION 1: NETWORK (PPPoE user, IP, MAC) ============== *}
        {assign var="has_network" value=false}
        {if isset($device.ppp_username) || isset($device.pppoe_username) || isset($device.pppoe_ip) || isset($device.ip) || isset($device.ppp_mac) || isset($device.mac_address)}
            {assign var="has_network" value=true}
        {/if}
        {if $has_network}
        <div class="dd-metric-section">
            <div class="dd-metric-section-title">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Network
            </div>
            <div class="dd-metric-grid">
                {assign var="user_val" value=$device.pppoe_username|default:$device.ppp_username}
                {if $user_val}
                <div class="dd-metric-card">
                    <div class="dd-metric-icon" style="background:#eff6ff;color:#0271c6;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">PPPoE User</div>
                        <div class="dd-metric-value">{$user_val}</div>
                    </div>
                </div>
                {/if}
                {assign var="ip_val" value=$device.pppoe_ip|default:$device.ip}
                {if $ip_val && $ip_val != 'N/A'}
                <div class="dd-metric-card">
                    <div class="dd-metric-icon" style="background:#f0f9ff;color:#0284c7;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><line x1="2" y1="12" x2="22" y2="12" stroke="currentColor" stroke-width="2"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" stroke="currentColor" stroke-width="2"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">IP Address</div>
                        <div class="dd-metric-value" style="font-family:'DM Mono',ui-monospace,monospace;">{$ip_val}</div>
                    </div>
                </div>
                {/if}
                {assign var="mac_val" value=$device.ppp_mac|default:$device.mac_address}
                {if $mac_val && $mac_val != 'N/A'}
                <div class="dd-metric-card dd-metric-wide">
                    <div class="dd-metric-icon" style="background:#f8fafc;color:#475569;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="2" y="6" width="20" height="12" rx="2" stroke="currentColor" stroke-width="2"/><path d="M6 12h.01M10 12h.01M14 12h.01M18 12h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">MAC Address</div>
                        <div class="dd-metric-value" style="font-family:'DM Mono',ui-monospace,monospace;">{$mac_val}</div>
                    </div>
                </div>
                {/if}
            </div>
        </div>
        {/if}

        {* ============== SECTION 2: HARDWARE & HEALTH (SN, temp, rx, pon) ============== *}
        {* Selalu render section ini supaya RX Power tetap muncul meskipun N/A *}
        {assign var="sn_val" value=$device.serial_number|default:$device.sn}
        <div class="dd-metric-section">
            <div class="dd-metric-section-title">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.42 4.58a5.4 5.4 0 0 0-7.65 0l-.77.78-.77-.78a5.4 5.4 0 0 0-7.65 0C1.46 6.7 1.33 10.28 4 13l8 8 8-8c2.67-2.72 2.54-6.3.42-8.42z"/></svg>
                Hardware &amp; Health
            </div>
            <div class="dd-metric-grid">
                {if $sn_val && $sn_val != 'N/A'}
                <div class="dd-metric-card">
                    <div class="dd-metric-icon" style="background:#faf5ff;color:#7c3aed;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">Serial Number</div>
                        <div class="dd-metric-value" style="font-family:'DM Mono',ui-monospace,monospace;font-size:11px;">{$sn_val}</div>
                    </div>
                </div>
                {/if}
                {if isset($device.rx_power) && $device.rx_power && $device.rx_power != 'N/A'}
                    {assign var="rx_v" value=floatval($device.rx_power)}
                    {assign var="rx_str" value=$device.rx_power|replace:' dBm':''|trim}
                <div class="dd-metric-card">
                    <div class="dd-metric-icon" style="background:#f0fdf4;color:#16a34a;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">RX Power</div>
                        <div class="dd-metric-value">
                            {if $rx_v >= -20}<span class="dd-badge-rx-good">{$rx_str} dBm</span>
                            {elseif $rx_v >= -25}<span class="dd-badge-rx-fair">{$rx_str} dBm</span>
                            {else}<span class="dd-badge-rx-poor">{$rx_str} dBm</span>{/if}
                        </div>
                    </div>
                </div>
                {else}
                <div class="dd-metric-card">
                    <div class="dd-metric-icon" style="background:#f1f5f9;color:#94a3b8;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">RX Power</div>
                        <div class="dd-metric-value"><span class="dd-badge-rx-na">N/A</span></div>
                    </div>
                </div>
                {/if}
                {if isset($device.temperature) && $device.temperature && $device.temperature != 'N/A'}
                    {assign var="temp_v" value=floatval($device.temperature)}
                    {assign var="temp_clean" value=$device.temperature|replace:'°C':''}
                    {assign var="temp_clean" value=$temp_clean|replace:'C':''}
                <div class="dd-metric-card">
                    <div class="dd-metric-icon" style="background:#fff7ed;color:#c2410c;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z" stroke="currentColor" stroke-width="2"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">Temperature</div>
                        <div class="dd-metric-value">
                            {if $temp_v < 60}<span class="dd-badge-temp-ok">{$temp_clean|trim}°C</span>
                            {elseif $temp_v < 75}<span class="dd-badge-temp-warm">{$temp_clean|trim}°C</span>
                            {else}<span class="dd-badge-temp-hot">{$temp_clean|trim}°C</span>{/if}
                        </div>
                    </div>
                </div>
                {/if}
                {if isset($device.pon_type) && $device.pon_type}
                <div class="dd-metric-card">
                    <div class="dd-metric-icon" style="background:#ede9fe;color:#7c3aed;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M18.36 6.64A9 9 0 1 1 5.64 6.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="12" y1="2" x2="12" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">PON Type</div>
                        <div class="dd-metric-value">
                            {if $device.pon_type == 'GPON'}<span class="dd-badge-pon-gpon">{$device.pon_type}</span>
                            {elseif $device.pon_type == 'EPON'}<span class="dd-badge-pon-epon">{$device.pon_type}</span>
                            {elseif $device.pon_type == 'Ethernet' || $device.pon_type == 'ETHERNET'}<span class="dd-badge-pon-eth">{$device.pon_type}</span>
                            {else}<span class="dd-badge-plain">{$device.pon_type}</span>{/if}
                        </div>
                    </div>
                </div>
                {/if}
            </div>
        </div>

        {* ============== SECTION 3: SESSION & TIMING (uptime, last inform) ============== *}
        {assign var="ppp_up" value=$device.ppp_uptime|default:$device.uptime}
        {assign var="has_timing" value=false}
        {if $ppp_up || isset($device.last_inform)}
            {assign var="has_timing" value=true}
        {/if}
        {if $has_timing}
        <div class="dd-metric-section">
            <div class="dd-metric-section-title">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                Session &amp; Timing
            </div>
            <div class="dd-metric-grid">
                {if $ppp_up}
                <div class="dd-metric-card dd-metric-wide">
                    <div class="dd-metric-icon" style="background:#eff6ff;color:#0271c6;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><polyline points="12 6 12 12 16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">PPPoE Uptime</div>
                        <div class="dd-metric-value">{$ppp_up}</div>
                    </div>
                </div>
                {/if}
                {if isset($device.last_inform) && $device.last_inform}
                <div class="dd-metric-card dd-metric-wide">
                    <div class="dd-metric-icon" style="background:#f0fdf4;color:#16a34a;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/><line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <div class="dd-metric-body">
                        <div class="dd-metric-label">Last Inform</div>
                        <div class="dd-metric-value">{$device.last_inform}</div>
                    </div>
                </div>
                {/if}
            </div>
        </div>
        {/if}

    </div>
</div>

<!-- ===================== WiFi+Tags (kiri) | Web Admin (kanan) ===================== -->
<div class="dd-section-row">

    <!-- KIRI: WiFi Information + Device Tags digabung -->
    <div class="bk-card{if $device.status != 'online'} dd-card-offline{/if}" style="margin-bottom:0;">
        <div class="bk-card-header" style="justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div class="bk-card-icon" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0);">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M5 12.55a11 11 0 0 1 14.08 0" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/><path d="M1.42 9a16 16 0 0 1 21.16 0" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="20" r="1" fill="#16a34a"/></svg>
                </div>
                <div class="bk-card-title">WiFi Information</div>
            </div>
            <button class="dd-action-btn edit" onclick="ddOpenWifiSheet()" title="Edit WiFi Settings">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Edit
            </button>
        </div>
        <div class="bk-card-body" style="padding:14px 18px;">
            {if $device.status != 'online'}<div class="dd-offline-badge"><i class="ph ph-wifi-slash"></i><span>Device is offline</span></div>{/if}

            {* ============== WiFi Band Cards v2 (2.4G + 5G side by side) ============== *}
            <div class="dd-wifi-bands">

                {* ---------- 2.4 GHz band ---------- *}
                <div class="dd-band-card dd-band-2g">
                    <div class="dd-band-head">
                        <span class="dd-band-tag dd-band-tag-2g">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12.55a11 11 0 0 1 14.08 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M1.42 9a16 16 0 0 1 21.16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>
                            2.4 GHz
                        </span>
                        {if $wifi_info.wifi_2g_enabled}
                            <span class="dd-band-status dd-band-status-on"><span class="dd-band-status-dot"></span> Active</span>
                        {else}
                            <span class="dd-band-status dd-band-status-off"><span class="dd-band-status-dot"></span> Off</span>
                        {/if}
                    </div>
                    {assign var="ssid2g" value=$wifi_info.ssid_2g|default:'N/A'}
                    {if $ssid2g && $ssid2g != 'N/A'}
                        <div class="dd-band-ssid">{$ssid2g}</div>
                    {else}
                        <div class="dd-band-ssid dd-band-ssid-na">SSID not set</div>
                    {/if}
                    <div class="dd-band-rows">
                        <div class="dd-band-row">
                            <span class="dd-band-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                            </span>
                            <span id="wifi-password" style="display:none;" class="dd-band-row-val">{$wifi_info.password|default:'N/A'}</span>
                            <span id="wifi-password-hidden" class="dd-band-row-val">{if $wifi_info.password && $wifi_info.password != 'N/A'}••••••••{else}Not set{/if}</span>
                            {if $wifi_info.password && $wifi_info.password != 'N/A'}
                            <button class="dd-band-eye-btn" onclick="togglePassword()" title="Show/hide password">
                                <svg id="password-icon-svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                            {/if}
                        </div>
                        {if isset($wifi_info.wifi_connected_2g)}
                        <div class="dd-band-row">
                            <span class="dd-band-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="5" y="2" width="14" height="20" rx="2" stroke="currentColor" stroke-width="2"/><line x1="9" y1="18" x2="15" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                            </span>
                            <span class="dd-band-row-val dd-band-row-val-text">{$wifi_info.wifi_connected_2g|default:0} device{if $wifi_info.wifi_connected_2g != 1}s{/if} connected</span>
                        </div>
                        {/if}
                    </div>
                </div>

                {* ---------- 5 GHz band ---------- *}
                <div class="dd-band-card dd-band-5g">
                    <div class="dd-band-head">
                        <span class="dd-band-tag dd-band-tag-5g">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12.55a11 11 0 0 1 14.08 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M1.42 9a16 16 0 0 1 21.16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>
                            5 GHz
                        </span>
                        {if $wifi_info.wifi_5g_enabled}
                            <span class="dd-band-status dd-band-status-on"><span class="dd-band-status-dot"></span> Active</span>
                        {else}
                            <span class="dd-band-status dd-band-status-off"><span class="dd-band-status-dot"></span> Off</span>
                        {/if}
                    </div>
                    {assign var="ssid5g" value=$wifi_info.ssid_5g|default:'N/A'}
                    {if $ssid5g && $ssid5g != 'N/A'}
                        <div class="dd-band-ssid">{$ssid5g}</div>
                    {else}
                        <div class="dd-band-ssid dd-band-ssid-na">SSID not set</div>
                    {/if}
                    <div class="dd-band-rows">
                        <div class="dd-band-row">
                            <span class="dd-band-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                            </span>
                            <span id="wifi-password-5g" style="display:none;" class="dd-band-row-val">{$wifi_info.password|default:'N/A'}</span>
                            <span id="wifi-password-5g-hidden" class="dd-band-row-val">{if $wifi_info.password && $wifi_info.password != 'N/A'}••••••••{else}Not set{/if}</span>
                            {if $wifi_info.password && $wifi_info.password != 'N/A'}
                            <button class="dd-band-eye-btn" onclick="togglePassword5g()" title="Show/hide password">
                                <svg id="password-icon-svg-5g" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                            {/if}
                        </div>
                        {if isset($wifi_info.wifi_connected_5g)}
                        <div class="dd-band-row">
                            <span class="dd-band-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="5" y="2" width="14" height="20" rx="2" stroke="currentColor" stroke-width="2"/><line x1="9" y1="18" x2="15" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                            </span>
                            <span class="dd-band-row-val dd-band-row-val-text">{$wifi_info.wifi_connected_5g|default:0} device{if $wifi_info.wifi_connected_5g != 1}s{/if} connected</span>
                        </div>
                        {/if}
                    </div>
                </div>

            </div>

            <!-- Device Tags — digabung di bawah WiFi dengan garis pemisah -->
            <div class="dd-tags-section">
                <div class="dd-tags-section-header">
                    <div style="display:flex;align-items:center;gap:7px;">
                        <span style="display:inline-flex;align-items:center;justify-content:center;width:22px;height:22px;border-radius:6px;background:linear-gradient(135deg,#fef3c7,#fde68a);color:#d97706;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><circle cx="7" cy="7" r="1.5" fill="currentColor"/></svg>
                        </span>
                        <span style="font-size:11px;font-weight:700;color:#475569;text-transform:uppercase;letter-spacing:0.05em;">Device Tags</span>
                    </div>
                    <button class="dd-action-btn edit" onclick="ddOpenTagsSheet()" title="Edit Tags">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Edit
                    </button>
                </div>
                <div id="tags-display">
                    {assign var="tags_to_display" value=$device.all_tags|default:$device.tags}
                    {if $tags_to_display && $tags_to_display != 'N/A'}
                        {* Parse tags sama persis logic lama: split by comma, index 0 = user, index 1 = location, sisanya extra *}
                        {if strpos($tags_to_display, ', ') !== false}{assign var="tags_array" value=", "|explode:$tags_to_display}
                        {elseif strpos($tags_to_display, ',') !== false}{assign var="tags_array" value=","|explode:$tags_to_display}
                        {else}{if $device.lokasi && $device.lokasi != 'N/A'}{assign var="tags_array" value=[$device.tags, $device.lokasi]}
                        {else}{assign var="tags_array" value=[$tags_to_display]}{/if}{/if}

                        <div class="dd-tag-grid">
                            {assign var="has_user_tag" value=false}
                            {assign var="has_loc_tag" value=false}

                            {foreach $tags_array as $tag}{if $tag|trim != ''}
                                {if $tag@index == 0}
                                    {assign var="has_user_tag" value=true}
                                    <div class="dd-tag-card dd-tag-card-user">
                                        <div class="dd-tag-card-head">
                                            <span class="dd-tag-card-chip dd-tag-card-chip-user">
                                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                                                User
                                            </span>
                                        </div>
                                        <div class="dd-tag-card-value">{$tag|trim}</div>
                                    </div>
                                {elseif $tag@index == 1}
                                    {assign var="has_loc_tag" value=true}
                                    <div class="dd-tag-card dd-tag-card-loc">
                                        <div class="dd-tag-card-head">
                                            <span class="dd-tag-card-chip dd-tag-card-chip-loc">
                                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                                Location
                                            </span>
                                        </div>
                                        <div class="dd-tag-card-value">{$tag|trim}</div>
                                    </div>
                                {else}
                                    <div class="dd-tag-card dd-tag-card-extra">
                                        <div class="dd-tag-card-head">
                                            <span class="dd-tag-card-chip dd-tag-card-chip-extra">
                                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><circle cx="7" cy="7" r="1.5" fill="currentColor"/></svg>
                                                Tag
                                            </span>
                                        </div>
                                        <div class="dd-tag-card-value">{$tag|trim}</div>
                                    </div>
                                {/if}
                            {/if}{/foreach}

                            {* Placeholder cards untuk kategori yang belum ada → bikin area terlihat full *}
                            {if !$has_user_tag}
                                <div class="dd-tag-card dd-tag-card-user" style="opacity:0.7;">
                                    <div class="dd-tag-card-head">
                                        <span class="dd-tag-card-chip dd-tag-card-chip-user">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                                            User
                                        </span>
                                    </div>
                                    <div class="dd-tag-card-value dd-tag-card-empty">(not set)</div>
                                </div>
                            {/if}
                            {if !$has_loc_tag}
                                <div class="dd-tag-card dd-tag-card-loc" style="opacity:0.7;">
                                    <div class="dd-tag-card-head">
                                        <span class="dd-tag-card-chip dd-tag-card-chip-loc">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                            Location
                                        </span>
                                    </div>
                                    <div class="dd-tag-card-value dd-tag-card-empty">(not set)</div>
                                </div>
                            {/if}
                        </div>
                    {else}
                        {* Tidak ada tag sama sekali → tampilkan 2 placeholder card biar area tetap rapi *}
                        <div class="dd-tag-grid">
                            <div class="dd-tag-card dd-tag-card-user" style="opacity:0.7;">
                                <div class="dd-tag-card-head">
                                    <span class="dd-tag-card-chip dd-tag-card-chip-user">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                                        User
                                    </span>
                                </div>
                                <div class="dd-tag-card-value dd-tag-card-empty">(not set)</div>
                            </div>
                            <div class="dd-tag-card dd-tag-card-loc" style="opacity:0.7;">
                                <div class="dd-tag-card-head">
                                    <span class="dd-tag-card-chip dd-tag-card-chip-loc">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                        Location
                                    </span>
                                </div>
                                <div class="dd-tag-card-value dd-tag-card-empty">(not set)</div>
                            </div>
                        </div>
                    {/if}
                </div>
            </div>
        </div>
    </div>

    <!-- KANAN: Web Admin Credentials — grid 2x2 -->
    <div class="bk-card{if $device.status != 'online'} dd-card-offline{/if}" style="margin-bottom:0;">
        <div class="bk-card-header" style="justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div class="bk-card-icon" style="background:linear-gradient(135deg,#fee2e2,#fecaca);">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="#dc2626" stroke-width="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/></svg>
                </div>
                <div>
                    <div class="bk-card-title">Web Admin</div>
                    <div class="bk-card-subtitle">Router credentials</div>
                </div>
            </div>
            <div style="display:flex;gap:6px;align-items:center;">
                <button class="dd-action-btn refresh-sm" onclick="ddRefreshWebAdmin()" title="Refresh Web Admin">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M21 12a9 9 0 1 1-2.1-5.7" stroke="#0271c6" stroke-width="2" stroke-linecap="round"/><polyline points="21 3 21 9 15 9" stroke="#0271c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Refresh
                </button>
                <button class="dd-action-btn edit" onclick="ddOpenAdminSheet()" title="Edit Credentials">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Edit
                </button>
            </div>
        </div>
        <div class="bk-card-body">
            {if $device.status != 'online'}<div class="dd-offline-badge"><i class="ph ph-lock-key"></i><span>Device is offline</span></div>{/if}
            <div class="dd-role-stack">

                {* ============== SUPER ADMIN CARD ============== *}
                <div class="dd-role-card dd-role-super">
                    <div class="dd-role-head">
                        <span class="dd-role-chip dd-role-chip-super">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20h20l-2-10-5 3-3-6-3 6-5-3-2 10z"/></svg>
                            Super Admin
                        </span>
                    </div>
                    <div class="dd-role-rows">
                        <div class="dd-role-row">
                            <span class="dd-role-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                            </span>
                            {if $web_admin.super_username}
                                <span class="dd-role-row-val" id="superUserVal">{$web_admin.super_username}</span>
                                <button class="dd-role-copy" onclick="ddCopyRole(this,'superUserVal')" title="Copy username">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                    <span class="dd-role-copy-label">Copy</span>
                                </button>
                            {else}
                                <span class="dd-role-row-val dd-role-empty">(not set)</span>
                            {/if}
                        </div>
                        <div class="dd-role-row">
                            <span class="dd-role-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <span id="super-pass-display" class="dd-role-row-val" style="display:none;">{$web_admin.super_password}</span>
                            <span id="super-pass-hidden" class="dd-role-row-val {if !$web_admin.super_password}dd-role-empty{/if}">{if $web_admin.super_password}••••••••{else}(empty){/if}</span>
                            {if $web_admin.super_password}
                            <button class="dd-role-copy" onclick="toggleSuperPassDisplay()" title="Show/hide password">
                                <svg id="super-pass-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                            {/if}
                        </div>
                    </div>
                </div>

                {* ============== USER ADMIN CARD ============== *}
                <div class="dd-role-card dd-role-user">
                    <div class="dd-role-head">
                        <span class="dd-role-chip dd-role-chip-user">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                            User Admin
                        </span>
                    </div>
                    <div class="dd-role-rows">
                        <div class="dd-role-row">
                            <span class="dd-role-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                            </span>
                            {if $web_admin.user_username}
                                <span class="dd-role-row-val" id="userUserVal">{$web_admin.user_username}</span>
                                <button class="dd-role-copy" onclick="ddCopyRole(this,'userUserVal')" title="Copy username">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                    <span class="dd-role-copy-label">Copy</span>
                                </button>
                            {else}
                                <span class="dd-role-row-val dd-role-empty">(not set)</span>
                            {/if}
                        </div>
                        <div class="dd-role-row">
                            <span class="dd-role-row-icon">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <span id="user-pass-display" class="dd-role-row-val" style="display:none;">{$web_admin.user_password}</span>
                            <span id="user-pass-hidden" class="dd-role-row-val {if !$web_admin.user_password}dd-role-empty{/if}">{if $web_admin.user_password}••••••••{else}(empty){/if}</span>
                            {if $web_admin.user_password}
                            <button class="dd-role-copy" onclick="toggleUserPassDisplay()" title="Show/hide password">
                                <svg id="user-pass-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                            {/if}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- ===================== CONNECTED USERS ===================== -->
<div class="bk-card{if $device.status != 'online'} dd-card-offline{/if}">
    <div class="bk-card-header" style="justify-content:space-between;">
        <div style="display:flex;align-items:center;gap:10px;">
            <div class="bk-card-icon" style="background:linear-gradient(135deg,#d1fae5,#a7f3d0);">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="#059669" stroke-width="2" stroke-linecap="round"/><circle cx="9" cy="7" r="4" stroke="#059669" stroke-width="2"/><path d="M23 21v-2a4 4 0 0 0-3-3.87" stroke="#059669" stroke-width="2" stroke-linecap="round"/><path d="M16 3.13a4 4 0 0 1 0 7.75" stroke="#059669" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <div style="display:flex;align-items:center;gap:8px;">
                <div class="bk-card-title">Connected Users</div>
                <span class="dd-count">{count($connected_users)}</span>
            </div>
        </div>
        <button class="dd-action-btn refresh" onclick="ddRefreshUsers()" title="Refresh Users">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M21 12a9 9 0 1 1-2.1-5.7" stroke="#0271c6" stroke-width="2" stroke-linecap="round"/><polyline points="21 3 21 9 15 9" stroke="#0271c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Refresh
        </button>
    </div>
    <div class="bk-card-body" style="padding:0;">
        {if $device.status != 'online'}<div class="dd-offline-badge"><i class="ph ph-users-three"></i><span>Device is offline</span></div>{/if}
        {if count($connected_users) > 0}

            {* ============== SUMMARY STATS (4 mini-cards by connection type) ============== *}
            {assign var="cnt_24"  value=0}
            {assign var="cnt_5g"  value=0}
            {assign var="cnt_lan" value=0}
            {assign var="cnt_unk" value=0}
            {foreach $connected_users as $u}
                {if $u.connection_type == 'WiFi 2.4GHz'}{assign var="cnt_24"  value=$cnt_24 + 1}
                {elseif $u.connection_type == 'WiFi 5GHz'}{assign var="cnt_5g"  value=$cnt_5g + 1}
                {elseif $u.connection_type == 'Ethernet'}{assign var="cnt_lan" value=$cnt_lan + 1}
                {else}{assign var="cnt_unk" value=$cnt_unk + 1}{/if}
            {/foreach}

            <div class="dd-users-stats">
                <div class="dd-user-stat dd-user-stat-24">
                    <span class="dd-user-stat-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>
                    </span>
                    <div class="dd-user-stat-body">
                        <div class="dd-user-stat-num">{$cnt_24}</div>
                        <div class="dd-user-stat-lbl">2.4 GHz</div>
                    </div>
                </div>
                <div class="dd-user-stat dd-user-stat-5g">
                    <span class="dd-user-stat-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>
                    </span>
                    <div class="dd-user-stat-body">
                        <div class="dd-user-stat-num">{$cnt_5g}</div>
                        <div class="dd-user-stat-lbl">5 GHz</div>
                    </div>
                </div>
                <div class="dd-user-stat dd-user-stat-lan">
                    <span class="dd-user-stat-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="9" width="18" height="11" rx="2"/><path d="M7 9V5m5 4V5m5 4V5"/></svg>
                    </span>
                    <div class="dd-user-stat-body">
                        <div class="dd-user-stat-num">{$cnt_lan}</div>
                        <div class="dd-user-stat-lbl">LAN</div>
                    </div>
                </div>
                <div class="dd-user-stat dd-user-stat-unk">
                    <span class="dd-user-stat-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    </span>
                    <div class="dd-user-stat-body">
                        <div class="dd-user-stat-num">{$cnt_unk}</div>
                        <div class="dd-user-stat-lbl">Unknown</div>
                    </div>
                </div>
            </div>

            {* ============== GROUPED USER LIST ============== *}
            <div class="dd-user-groups">

                {* ---------- Group 2.4 GHz ---------- *}
                {if $cnt_24 > 0}
                <div class="dd-user-group dd-user-group-24">
                    <div class="dd-user-group-title">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>
                        2.4 GHz
                        <span class="dd-user-group-count">{$cnt_24}</span>
                    </div>
                    <div class="dd-user-items">
                        {foreach $connected_users as $user}
                            {if $user.connection_type == 'WiFi 2.4GHz'}
                                {assign var="uname" value=$user.hostname|default:''}
                                {assign var="uname_lower" value=$uname|lower}
                                <div class="dd-user-item">
                                    <div class="dd-user-avatar">
                                        {if strpos($uname_lower,'iphone') !== false || strpos($uname_lower,'ipad') !== false || strpos($uname_lower,'android') !== false || strpos($uname_lower,'samsung') !== false || strpos($uname_lower,'xiaomi') !== false || strpos($uname_lower,'redmi') !== false || strpos($uname_lower,'realme') !== false || strpos($uname_lower,'oppo') !== false || strpos($uname_lower,'vivo') !== false || strpos($uname_lower,'huawei') !== false || strpos($uname_lower,'poco') !== false || strpos($uname_lower,'phone') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                        {elseif strpos($uname_lower,'macbook') !== false || strpos($uname_lower,'laptop') !== false || strpos($uname_lower,'book') !== false || strpos($uname_lower,'thinkpad') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="2" y1="21" x2="22" y2="21"/></svg>
                                        {elseif strpos($uname_lower,'tv') !== false || strpos($uname_lower,'roku') !== false || strpos($uname_lower,'chromecast') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><polyline points="8 21 12 17 16 21"/></svg>
                                        {elseif strpos($uname_lower,'desktop') !== false || strpos($uname_lower,'pc-') !== false || strpos($uname_lower,'windows') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                        {else}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                                        {/if}
                                    </div>
                                    <div class="dd-user-body">
                                        {if $uname}
                                            <div class="dd-user-name">{$uname}</div>
                                        {else}
                                            <div class="dd-user-name dd-user-name-unknown">Unknown device</div>
                                        {/if}
                                        <div class="dd-user-meta">
                                            <span class="dd-badge-ip">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                                {$user.ip}
                                            </span>
                                            <span class="dd-badge-mac">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 12h.01M10 12h.01M14 12h.01M18 12h.01"/></svg>
                                                {$user.mac}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                </div>
                {/if}

                {* ---------- Group 5 GHz ---------- *}
                {if $cnt_5g > 0}
                <div class="dd-user-group dd-user-group-5g">
                    <div class="dd-user-group-title">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>
                        5 GHz
                        <span class="dd-user-group-count">{$cnt_5g}</span>
                    </div>
                    <div class="dd-user-items">
                        {foreach $connected_users as $user}
                            {if $user.connection_type == 'WiFi 5GHz'}
                                {assign var="uname" value=$user.hostname|default:''}
                                {assign var="uname_lower" value=$uname|lower}
                                <div class="dd-user-item">
                                    <div class="dd-user-avatar">
                                        {if strpos($uname_lower,'iphone') !== false || strpos($uname_lower,'ipad') !== false || strpos($uname_lower,'android') !== false || strpos($uname_lower,'samsung') !== false || strpos($uname_lower,'xiaomi') !== false || strpos($uname_lower,'redmi') !== false || strpos($uname_lower,'realme') !== false || strpos($uname_lower,'oppo') !== false || strpos($uname_lower,'vivo') !== false || strpos($uname_lower,'huawei') !== false || strpos($uname_lower,'poco') !== false || strpos($uname_lower,'phone') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                        {elseif strpos($uname_lower,'macbook') !== false || strpos($uname_lower,'laptop') !== false || strpos($uname_lower,'book') !== false || strpos($uname_lower,'thinkpad') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="2" y1="21" x2="22" y2="21"/></svg>
                                        {elseif strpos($uname_lower,'tv') !== false || strpos($uname_lower,'roku') !== false || strpos($uname_lower,'chromecast') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><polyline points="8 21 12 17 16 21"/></svg>
                                        {elseif strpos($uname_lower,'desktop') !== false || strpos($uname_lower,'pc-') !== false || strpos($uname_lower,'windows') !== false}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                        {else}
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                                        {/if}
                                    </div>
                                    <div class="dd-user-body">
                                        {if $uname}
                                            <div class="dd-user-name">{$uname}</div>
                                        {else}
                                            <div class="dd-user-name dd-user-name-unknown">Unknown device</div>
                                        {/if}
                                        <div class="dd-user-meta">
                                            <span class="dd-badge-ip">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                                {$user.ip}
                                            </span>
                                            <span class="dd-badge-mac">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 12h.01M10 12h.01M14 12h.01M18 12h.01"/></svg>
                                                {$user.mac}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                </div>
                {/if}

                {* ---------- Group LAN ---------- *}
                {if $cnt_lan > 0}
                <div class="dd-user-group dd-user-group-lan">
                    <div class="dd-user-group-title">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="9" width="18" height="11" rx="2"/><path d="M7 9V5m5 4V5m5 4V5"/></svg>
                        Ethernet
                        <span class="dd-user-group-count">{$cnt_lan}</span>
                    </div>
                    <div class="dd-user-items">
                        {foreach $connected_users as $user}
                            {if $user.connection_type == 'Ethernet'}
                                {assign var="uname" value=$user.hostname|default:''}
                                <div class="dd-user-item">
                                    <div class="dd-user-avatar">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                    </div>
                                    <div class="dd-user-body">
                                        {if $uname}
                                            <div class="dd-user-name">{$uname}</div>
                                        {else}
                                            <div class="dd-user-name dd-user-name-unknown">Unknown device</div>
                                        {/if}
                                        <div class="dd-user-meta">
                                            <span class="dd-badge-ip">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                                {$user.ip}
                                            </span>
                                            <span class="dd-badge-mac">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 12h.01M10 12h.01M14 12h.01M18 12h.01"/></svg>
                                                {$user.mac}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                </div>
                {/if}

                {* ---------- Group Unknown ---------- *}
                {if $cnt_unk > 0}
                <div class="dd-user-group dd-user-group-unk">
                    <div class="dd-user-group-title">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                        Unknown
                        <span class="dd-user-group-count">{$cnt_unk}</span>
                    </div>
                    <div class="dd-user-items">
                        {foreach $connected_users as $user}
                            {if $user.connection_type != 'WiFi 2.4GHz' && $user.connection_type != 'WiFi 5GHz' && $user.connection_type != 'Ethernet'}
                                {assign var="uname" value=$user.hostname|default:''}
                                <div class="dd-user-item">
                                    <div class="dd-user-avatar">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                    </div>
                                    <div class="dd-user-body">
                                        {if $uname}
                                            <div class="dd-user-name">{$uname}</div>
                                        {else}
                                            <div class="dd-user-name dd-user-name-unknown">Unknown device</div>
                                        {/if}
                                        <div class="dd-user-meta">
                                            <span class="dd-badge-ip">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                                {$user.ip}
                                            </span>
                                            <span class="dd-badge-mac">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 12h.01M10 12h.01M14 12h.01M18 12h.01"/></svg>
                                                {$user.mac}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                </div>
                {/if}

            </div>

        {else}
        <div class="dd-empty" style="padding:36px;">
            <i class="ph ph-user-minus"></i><p>No connected users found</p>
        </div>
        {/if}
    </div>
</div>

<!-- ===================== BOTTOM SHEET OVERLAY (shared) ===================== -->
<div id="ddSheetOverlay" onclick="if(event.target===this)ddCloseSheet()">
    <div id="ddSheetCard">
        <div class="dd-sheet-header">
            <div class="dd-sheet-title" id="ddSheetTitle"></div>
            <button class="dd-sheet-close" onclick="ddCloseSheet()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><line x1="18" y1="6" x2="6" y2="18" stroke="white" stroke-width="2.5" stroke-linecap="round"/><line x1="6" y1="6" x2="18" y2="18" stroke="white" stroke-width="2.5" stroke-linecap="round"/></svg>
            </button>
        </div>
        <div class="dd-sheet-body" id="ddSheetBody"></div>
        <div class="dd-sheet-footer" id="ddSheetFooter"></div>
    </div>
</div>

<!-- ===================== NOTIFICATION MODAL (shared center) ===================== -->
<div id="ddModalOverlay" onclick="if(event.target===this&&ddModalClosable)ddCloseModal()">
    <div id="ddModalCard">
        <div id="ddModalHeader">
            <div id="ddModalTitle"></div>
            <button id="ddModalClosebtn" onclick="ddCloseModal()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><line x1="18" y1="6" x2="6" y2="18" stroke="white" stroke-width="2.5" stroke-linecap="round"/><line x1="6" y1="6" x2="18" y2="18" stroke="white" stroke-width="2.5" stroke-linecap="round"/></svg>
            </button>
        </div>
        <div id="ddModalBody"></div>
        <div id="ddModalFooter"></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
var ddBaseUrl = '{$_url}';
var ddDeviceId = '{$device_id_raw}';
{literal}
// ===================== MODAL ENGINE =====================
var ddModalClosable = true;

function ddOpenModal(opts) {
    var overlay  = document.getElementById('ddModalOverlay');
    var header   = document.getElementById('ddModalHeader');
    var title    = document.getElementById('ddModalTitle');
    var body     = document.getElementById('ddModalBody');
    var footer   = document.getElementById('ddModalFooter');
    var closeBtn = document.getElementById('ddModalClosebtn');

    header.style.background = opts.headerColor || 'linear-gradient(135deg,#0271c6,#0359a0)';
    title.innerHTML  = (opts.titleIcon ? '<i class="' + opts.titleIcon + '"></i> ' : '') + (opts.title || '');
    body.innerHTML   = opts.body   || '';
    footer.innerHTML = opts.footer || '';
    ddModalClosable  = opts.closable !== false;
    closeBtn.style.display = ddModalClosable ? 'flex' : 'none';

    overlay.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function ddCloseModal() {
    document.getElementById('ddModalOverlay').style.display = 'none';
    document.body.style.overflow = '';
}

function ddShowLoading(title, subtitle) {
    ddOpenModal({
        title: title || 'Mohon Tunggu...',
        titleIcon: 'ph ph-circle-notch',
        headerColor: 'linear-gradient(135deg,#0271c6,#0359a0)',
        closable: false,
        body: '<div style="text-align:center;padding:16px 0;">' +
              '<div class="dd-modal-spinner" style="margin:0 auto 16px;"></div>' +
              '<p style="color:#64748b;font-size:13px;margin:0;">' + (subtitle || 'Processing request...') + '</p>' +
              '</div>',
        footer: ''
    });
}

function ddShowSuccess(title, subtitle, onOk) {
    var footer = '<button class="bk-btn bk-btn-success" onclick="' + (onOk || 'ddCloseModal()') + '"><i class="ph ph-check" style="font-size:13px;"></i> OK</button>';
    var hdr = document.getElementById('ddModalHeader');
    var ttl = document.getElementById('ddModalTitle');
    var bdy = document.getElementById('ddModalBody');
    var ftr = document.getElementById('ddModalFooter');
    if (hdr) hdr.style.background = 'linear-gradient(135deg,#16a34a,#15803d)';
    if (ttl) ttl.innerHTML = '<i class="ph ph-check-circle"></i> ' + title;
    if (bdy) bdy.innerHTML =
        '<div style="text-align:center;padding:8px 0;">' +
        '<svg class="dd-check-svg" viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg" style="display:block;margin:0 auto 16px;">' +
        '<circle class="dd-check-circle" cx="26" cy="26" r="24"/>' +
        '<path class="dd-check-mark" d="M14 26 l8 8 l16 -16"/>' +
        '</svg>' +
        '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 4px;">' + title + '</p>' +
        (subtitle ? '<p style="font-size:12px;color:#64748b;margin:0;">' + subtitle + '</p>' : '') +
        '</div>';
    if (ftr) ftr.innerHTML = footer;
    ddModalClosable = true;
    document.getElementById('ddModalClosebtn').style.display = 'flex';
}

function ddShowError(title, subtitle) {
    var hdr = document.getElementById('ddModalHeader');
    var ttl = document.getElementById('ddModalTitle');
    var bdy = document.getElementById('ddModalBody');
    var ftr = document.getElementById('ddModalFooter');
    if (hdr) hdr.style.background = 'linear-gradient(135deg,#dc2626,#b91c1c)';
    if (ttl) ttl.innerHTML = '<i class="ph ph-warning"></i> ' + title;
    if (bdy) bdy.innerHTML =
        '<div style="text-align:center;padding:8px 0;">' +
        '<div style="width:64px;height:64px;border-radius:16px;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#dc2626;">' +
        '<i class="ph ph-warning"></i></div>' +
        '<p style="font-size:14px;color:#334155;margin:0;">' + (subtitle || '') + '</p>' +
        '</div>';
    if (ftr) ftr.innerHTML = '<button class="bk-btn bk-btn-ghost" onclick="ddCloseModal()">Close</button>';
    ddModalClosable = true;
    document.getElementById('ddModalClosebtn').style.display = 'flex';
}

// ===================== BOTTOM SHEET ENGINE =====================
function ddOpenSheet(opts) {
    document.getElementById('ddSheetTitle').innerHTML = (opts.icon ? '<i class="' + opts.icon + '"></i> ' : '') + (opts.title || '');
    document.getElementById('ddSheetBody').innerHTML   = opts.body   || '';
    document.getElementById('ddSheetFooter').innerHTML = opts.footer || '';
    document.getElementById('ddSheetOverlay').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function ddCloseSheet() {
    document.getElementById('ddSheetOverlay').style.display = 'none';
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') { ddCloseModal(); ddCloseSheet(); }
});

// ===================== PASSWORD TOGGLES =====================
function togglePassword() {
    var s = document.getElementById('wifi-password');
    var h = document.getElementById('wifi-password-hidden');
    var i = document.getElementById('password-icon-svg');
    if (!s || !h) return;
    var isHidden = (s.style.display === 'none' || s.style.display === '');
    if (isHidden) {
        s.style.display = 'inline';
        h.style.display = 'none';
        if (i) i.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    } else {
        s.style.display = 'none';
        h.style.display = 'inline';
        if (i) i.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
    }
}
function togglePassword5g() {
    var s = document.getElementById('wifi-password-5g');
    var h = document.getElementById('wifi-password-5g-hidden');
    var i = document.getElementById('password-icon-svg-5g');
    if (!s || !h) return;
    var isHidden = (s.style.display === 'none' || s.style.display === '');
    if (isHidden) {
        s.style.display = 'inline';
        h.style.display = 'none';
        if (i) i.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    } else {
        s.style.display = 'none';
        h.style.display = 'inline';
        if (i) i.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
    }
}
function toggleSuperPassDisplay() {
    var s = document.getElementById('super-pass-display');
    var h = document.getElementById('super-pass-hidden');
    var i = document.getElementById('super-pass-icon');
    if (!s || !h) return;
    var isHidden = (s.style.display === 'none' || s.style.display === '');
    if (isHidden) {
        s.style.display = 'inline';
        h.style.display = 'none';
        if (i) i.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    } else {
        s.style.display = 'none';
        h.style.display = 'inline';
        if (i) i.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
    }
}
function toggleUserPassDisplay() {
    var s = document.getElementById('user-pass-display');
    var h = document.getElementById('user-pass-hidden');
    var i = document.getElementById('user-pass-icon');
    if (!s || !h) return;
    var isHidden = (s.style.display === 'none' || s.style.display === '');
    if (isHidden) {
        s.style.display = 'inline';
        h.style.display = 'none';
        if (i) i.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    } else {
        s.style.display = 'none';
        h.style.display = 'inline';
        if (i) i.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
    }
}

// ===================== COPY DEVICE ID =====================
function ddCopyDeviceId(btn) {
    var idEl = document.getElementById('ddHeroId');
    if (!idEl) return;
    var text = idEl.textContent.trim();
    var label = btn.querySelector('.dd-identity-copy-label');
    var original = label ? label.textContent : 'Copy';

    var finish = function(ok) {
        btn.classList.toggle('copied', ok);
        if (label) label.textContent = ok ? 'Copied' : 'Failed';
        setTimeout(function() {
            btn.classList.remove('copied');
            if (label) label.textContent = original;
        }, 1400);
    };

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(function() { finish(true); }, function() { finish(false); });
    } else {
        // Fallback untuk browser tanpa clipboard API
        try {
            var ta = document.createElement('textarea');
            ta.value = text; ta.style.position = 'fixed'; ta.style.opacity = '0';
            document.body.appendChild(ta); ta.select();
            var ok = document.execCommand('copy');
            document.body.removeChild(ta);
            finish(ok);
        } catch (e) { finish(false); }
    }
}

// Generic copy helper untuk Web Admin role cards
function ddCopyRole(btn, valueId) {
    var valEl = document.getElementById(valueId);
    if (!valEl) return;
    var text = valEl.textContent.trim();
    var label = btn.querySelector('.dd-role-copy-label');
    var original = label ? label.textContent : 'Copy';

    var finish = function(ok) {
        btn.classList.toggle('copied', ok);
        if (label) label.textContent = ok ? 'Copied' : 'Failed';
        setTimeout(function() {
            btn.classList.remove('copied');
            if (label) label.textContent = original;
        }, 1400);
    };

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(function() { finish(true); }, function() { finish(false); });
    } else {
        try {
            var ta = document.createElement('textarea');
            ta.value = text; ta.style.position = 'fixed'; ta.style.opacity = '0';
            document.body.appendChild(ta); ta.select();
            var ok = document.execCommand('copy');
            document.body.removeChild(ta);
            finish(ok);
        } catch (e) { finish(false); }
    }
}

// Shorten vendor name at mobile (ambil kata pertama saja, contoh "Huawei Technologies Co., Ltd" → "Huawei")
(function() {
    var el = document.getElementById('ddVendorShort');
    if (!el) return;
    var full = el.textContent.trim();
    var short = full.split(/\s+/)[0] || full;
    el.textContent = short;
})();

// ===================== REFRESH DEVICE =====================
function ddRefreshDevice() {
    ddOpenModal({
        title: 'Refresh Device?',
        titleIcon: 'ph ph-arrows-clockwise',
        headerColor: 'linear-gradient(135deg,#0271c6,#0359a0)',
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div style="width:64px;height:64px;border-radius:16px;background:#eff6ff;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#0271c6;">' +
              '<i class="ph ph-arrows-clockwise"></i></div>' +
              '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Refresh semua parameter device?</p>' +
              '<p style="font-size:12px;color:#94a3b8;margin:0;">Data akan diperbarui dari ACS server.</p>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-primary" onclick="ddCloseModal();ddDoRefresh()"><i class="ph ph-arrows-clockwise" style="font-size:13px;"></i> Refresh</button>'
    });
}

function ddDoRefresh() {
    // PRE-CHECK: Cek status device dulu sebelum jalankan refresh steps
    ddOpenModal({
        title: 'Checking device...',
        titleIcon: 'ph ph-arrows-clockwise',
        headerColor: 'linear-gradient(135deg,#0271c6,#0359a0)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="dd-modal-spinner" style="margin:0 auto 20px;"></div>' +
              '<p style="font-size:13px;color:#64748b;margin:0;">Checking device status...</p>' +
              '</div>',
        footer: ''
    });

    // Summon dulu untuk cek apakah device online (pakai endpoint summon yang sudah ada _lastInform check)
    $.ajax({
        url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/summon',
        type: 'GET',
        dataType: 'json',
        timeout: 15000,
        success: function(r) {
            if (r && r.success) {
                // Device online — lanjut refresh steps
                ddDoRefreshSteps();
            } else {
                // Device offline
                ddShowError('Refresh Failed', r.error || 'Device is offline or unreachable.');
            }
        },
        error: function() {
            ddShowError('Refresh Failed', 'Device is offline or unreachable.');
        }
    });
}

function ddDoRefreshSteps() {
    // All-in-one sequential refresh: Users → WebAdmin → root
    var steps = [
        { url: 'refresh-users',     method: 'GET',  text: 'Refreshing connected users...' },
        { url: 'refresh-webadmin',  method: 'GET',  text: 'Refreshing admin credentials...' },
        { url: 'refresh',           method: 'GET',  text: 'Syncing device parameters...' }
    ];

    ddOpenModal({
        title: 'Refreshing...',
        titleIcon: 'ph ph-arrows-clockwise',
        headerColor: 'linear-gradient(135deg,#0271c6,#0359a0)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="dd-modal-spinner" style="margin:0 auto 20px;"></div>' +
              '<p id="ddRefreshText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + steps[0].text + '</p>' +
              '</div>',
        footer: ''
    });

    var anySuccess = false;
    var anyFailure = false;
    var failureMsg = '';

    function setText(idx) {
        var el = document.getElementById('ddRefreshText');
        if (!el) return;
        el.style.opacity = '0';
        setTimeout(function() {
            var e = document.getElementById('ddRefreshText');
            if (e) { e.textContent = steps[idx].text; e.style.opacity = '1'; }
        }, 250);
    }

    function runStep(idx) {
        if (idx >= steps.length) { finishRefresh(); return; }
        setText(idx);
        var s = steps[idx];
        $.ajax({
            url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/' + s.url,
            type: s.method,
            dataType: 'json',
            timeout: 20000,
            complete: function(xhr) {
                var r = null;
                try { r = xhr.responseJSON; } catch (e) {}
                if (r && r.success) {
                    anySuccess = true;
                } else {
                    anyFailure = true;
                    if (!failureMsg && r && r.error) failureMsg = r.error;
                }
                // Slight visual pause biar animasi terasa step-by-step (~800ms per step)
                setTimeout(function() { runStep(idx + 1); }, 600);
            }
        });
    }

    function finishRefresh() {
        // Kalau ada indikasi device offline/unreachable, selalu tampilkan error
        if (failureMsg && (failureMsg.indexOf('offline') !== -1 || failureMsg.indexOf('unreachable') !== -1 || failureMsg.indexOf('did not respond') !== -1)) {
            ddShowError('Refresh Failed', failureMsg);
        } else if (anySuccess) {
            ddShowSuccess('Refresh Complete!', 'Reloading page...');
            setTimeout(function() { window.location.reload(true); }, 1500);
        } else {
            ddShowError('Refresh Failed', failureMsg || 'Device is offline or unreachable.');
        }
    }

    runStep(0);
}

// ===================== SUMMON DEVICE =====================
function ddSummonDevice() {
    ddOpenModal({
        title: 'Summon Device?',
        titleIcon: 'ph ph-bell-ringing',
        headerColor: 'linear-gradient(135deg,#16a34a,#15803d)',
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div style="width:64px;height:64px;border-radius:16px;background:#dcfce7;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#16a34a;">' +
              '<i class="ph ph-bell-ringing"></i></div>' +
              '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Summon this device?</p>' +
              '<p style="font-size:12px;color:#94a3b8;margin:0;">The system will contact the device and fetch the latest data.</p>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-success" onclick="ddCloseModal();ddDoSummonSequence()"><i class="ph ph-bell-ringing" style="font-size:13px;"></i> Yes, Summon!</button>'
    });
}

function ddDoSummonSequence() {
    var texts = ['Sending signal to device...', 'Waiting for ONU response...', 'Authenticating TR-069 session...'];
    ddOpenModal({
        title: 'Summoning...',
        titleIcon: 'ph ph-bell-ringing',
        headerColor: 'linear-gradient(135deg,#16a34a,#15803d)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="dd-modal-spinner" style="border-top-color:#16a34a;margin:0 auto 20px;"></div>' +
              '<p id="ddSummonText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + texts[0] + '</p>' +
              '</div>',
        footer: ''
    });
    var idx = 1; var done = false; var ajaxDone = false; var ajaxResult = null; var animDone = false;
    function nextText() {
        if (idx >= texts.length) { animDone = true; tryShowSummonResult(); return; }
        var el = document.getElementById('ddSummonText');
        if (!el) return;
        el.style.opacity = '0';
        setTimeout(function() { var e = document.getElementById('ddSummonText'); if (e) { e.textContent = texts[idx]; e.style.opacity = '1'; } idx++; setTimeout(nextText, 1600); }, 300);
    }
    setTimeout(nextText, 1600);
    $.ajax({ url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/summon', type: 'GET', dataType: 'json', timeout: 30000,
        success: function(r) { ajaxResult = r; ajaxDone = true; tryShowSummonResult(); },
        error:   function()  { ajaxResult = null; ajaxDone = true; tryShowSummonResult(); }
    });
    function tryShowSummonResult() {
        if (!ajaxDone || !animDone) return;
        if (ajaxResult && ajaxResult.success) {
            ddShowSuccess('Summon Success!', 'Reloading page...');
            setTimeout(function() { window.location.reload(true); }, 2000);
        } else {
            var errMsg = (ajaxResult && ajaxResult.error) ? ajaxResult.error.replace('Failed to send connection request: ', '') : 'Device is offline or unreachable. Connection request sent but device did not respond.';
            ddShowError('Summon Failed!', errMsg);
        }
    }
}

function ddSummonGoGreen() {
    ddShowSuccess('Summon Success!', 'Reloading page...');
    setTimeout(function() { window.location.reload(true); }, 2000);
}

// ===================== REBOOT DEVICE =====================
function ddRebootDevice() {
    ddOpenModal({
        title: 'Reboot Device?',
        titleIcon: 'ph ph-power',
        headerColor: 'linear-gradient(135deg,#dc2626,#b91c1c)',
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div style="width:64px;height:64px;border-radius:16px;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#dc2626;">' +
              '<i class="ph ph-power"></i></div>' +
              '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Reboot this device?</p>' +
              '<p style="font-size:12px;color:#94a3b8;margin:0;">The device will restart. Connection will be temporarily lost.</p>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-danger" onclick="ddCloseModal();ddDoReboot()"><i class="ph ph-power" style="font-size:13px;"></i> Yes, Reboot!</button>'
    });
}

function ddDoReboot() {
    var texts = ['Sending reboot command...', 'Disconnecting device...', 'Waiting for restart...'];
    ddOpenModal({
        title: 'Rebooting...',
        titleIcon: 'ph ph-power',
        headerColor: 'linear-gradient(135deg,#dc2626,#b91c1c)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="dd-modal-spinner" style="border-top-color:#dc2626;margin:0 auto 20px;"></div>' +
              '<p id="ddRebootText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + texts[0] + '</p>' +
              '</div>',
        footer: ''
    });
    var idx = 1; var done = false; var ajaxDone = false; var ajaxResult = null; var minDone = false;
    function nextText() {
        if (done) return;
        if (idx >= texts.length) idx = 0;
        var el = document.getElementById('ddRebootText');
        if (!el) return;
        el.style.opacity = '0';
        setTimeout(function() { var e = document.getElementById('ddRebootText'); if (e) { e.textContent = texts[idx]; e.style.opacity = '1'; } idx++; if (!done) setTimeout(nextText, 1600); }, 300);
    }
    setTimeout(nextText, 1600);
    setTimeout(function() { minDone = true; tryRebootResult(); }, 3000);
    $.ajax({ url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/reboot', type: 'GET', dataType: 'json',
        success: function(r) { ajaxResult = r; ajaxDone = true; tryRebootResult(); },
        error:   function()  { ajaxResult = null; ajaxDone = true; tryRebootResult(); }
    });
    function tryRebootResult() {
        if (!ajaxDone || !minDone) return;
        done = true;
        if (ajaxResult && ajaxResult.success) {
            ddShowSuccess('Reboot Sent!', 'Reboot command has been sent to the device.');
        } else {
            var errMsg = (ajaxResult && ajaxResult.error) ? ajaxResult.error.replace('Failed to send connection request: ', '') : 'Device is offline or unreachable. Connection request sent but device did not respond.';
            ddShowError('Reboot Failed', errMsg);
        }
    }
}

// ===================== REFRESH USERS =====================
function ddRefreshUsers() {
    ddShowLoading('Refreshing Users...', 'Updating the list of connected devices');
    $.ajax({
        url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/refresh-users',
        type: 'GET', dataType: 'json',
        success: function(r) {
            if (r && r.success) { ddShowSuccess('Success!', 'Reloading...'); setTimeout(function(){ location.reload(); }, 1200); }
            else { ddShowError('Failed', r.error || 'Failed to refresh users'); }
        },
        error: function() { ddShowError('Failed', 'Failed to communicate with the server'); }
    });
}

// ===================== REFRESH WEB ADMIN =====================
function ddRefreshWebAdmin() {
    var texts = ['Contacting device...', 'Waiting for TR-069 connection...', 'Fetching admin parameters...'];
    ddOpenModal({
        title: 'Refresh Web Admin',
        titleIcon: 'ph ph-arrows-clockwise',
        headerColor: 'linear-gradient(135deg,#d97706,#b45309)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="dd-modal-spinner" style="border-top-color:#d97706;margin:0 auto 20px;"></div>' +
              '<p id="ddAdminRefreshText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + texts[0] + '</p>' +
              '</div>',
        footer: ''
    });
    var idx = 1; var done = false;
    function nextText() {
        if (done) return;
        if (idx >= texts.length) idx = 0;
        var el = document.getElementById('ddAdminRefreshText');
        if (!el) return;
        el.style.opacity = '0';
        setTimeout(function() { var e = document.getElementById('ddAdminRefreshText'); if (e) { e.textContent = texts[idx]; e.style.opacity = '1'; } idx++; if (!done) setTimeout(nextText, 1800); }, 300);
    }
    setTimeout(nextText, 1800);

    $.ajax({ url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/summon', type: 'GET', dataType: 'json',
        success: function(r) {
            if (r && r.success) {
                setTimeout(function() {
                    done = true;
                    $.ajax({ url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/refresh-webadmin', type: 'GET', dataType: 'json',
                        success: function(r2) {
                            if (r2 && r2.success) {
                                setTimeout(function() {
                                    ddShowSuccess('Web Admin Updated!', 'Reloading...');
                                    setTimeout(function() { location.reload(); }, 1200);
                                }, 1500);
                            } else { ddShowError('Failed', r2.error || 'Failed to refresh web admin'); }
                        },
                        error: function() { ddShowError('Failed', 'Failed to fetch web admin parameters'); }
                    });
                }, 5000);
            } else { done = true; ddShowError('Failed', r.error || 'Failed to contact the device'); }
        },
        error: function() { done = true; ddShowError('Failed', 'Failed to summon the device'); }
    });
}

// ===================== WIFI SHEET =====================
function ddOpenWifiSheet() {
    var ssidValue = '';
    {/literal}
    {foreach $wifi_info as $k => $v}
        {if strpos($k, 'ssid') !== false && strpos($k, '2g') !== false}
    ssidValue = '{$v|escape:"javascript"}';
        {/if}
    {/foreach}
    {literal}
    ddOpenSheet({
        title: 'Update WiFi Settings',
        icon: 'ph ph-wifi-high',
        body: '<div class="bk-form-group">' +
              '<label class="bk-label"><i class="ph ph-broadcast" style="font-size:10px;color:#7c3aed;"></i> New SSID *</label>' +
              '<input type="text" id="ws-ssid" class="bk-input" value="' + ssidValue + '" placeholder="Nama WiFi" required>' +
              '<span class="bk-help">5GHz otomatis menambahkan suffix "-5G"</span>' +
              '</div>' +
              '<div class="bk-form-group">' +
              '<label class="bk-label"><i class="ph ph-lock" style="font-size:10px;color:#7c3aed;"></i> New Password</label>' +
              '<div class="bk-input-wrap">' +
              '<input type="password" id="ws-pass" class="bk-input" placeholder="Leave empty to keep current" minlength="8">' +
              '<button type="button" class="bk-eye-btn" onclick="ddToggleWsPass()"><i class="ph ph-eye" id="ws-pass-icon"></i></button>' +
              '</div>' +
              '<span class="bk-help">Min 8 karakter</span>' +
              '</div>' +
              '<div class="bk-form-group">' +
              '<label class="bk-label"><i class="ph ph-shield-check" style="font-size:10px;color:#7c3aed;"></i> Force WPA/WPA2 Security</label>' +
              '<div class="dd-toggle-row">' +
              '<label class="dd-toggle"><input type="checkbox" id="ws-force"><span class="dd-toggle-track"></span><span class="dd-toggle-thumb"></span></label>' +
              '<span class="dd-toggle-lbl">Enable untuk paksa WPA/WPA2</span>' +
              '</div>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseSheet()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-primary" onclick="ddSubmitWifi()"><i class="ph ph-floppy-disk" style="font-size:13px;"></i> Update WiFi</button>'
    });
}

function ddToggleWsPass() {
    var i = document.getElementById('ws-pass');
    var ic = document.getElementById('ws-pass-icon');
    if (i.type === 'password') { i.type = 'text'; ic.className = 'ph ph-eye-slash'; }
    else { i.type = 'password'; ic.className = 'ph ph-eye'; }
}

function ddSubmitWifi() {
    var ssid  = document.getElementById('ws-ssid').value.trim();
    var pass  = document.getElementById('ws-pass').value.trim();
    var force = document.getElementById('ws-force').checked;
    if (!ssid) { alert('SSID is required'); return; }
    if (pass && pass.length < 8) { alert('Password must be at least 8 characters'); return; }

    var confirmHTML = '<strong>WiFi 2.4G:</strong> ' + ssid + '<br><strong>WiFi 5G:</strong> ' + ssid + '-5G<br>';
    confirmHTML += pass ? '<strong>Password:</strong> ' + pass : '<strong>Password:</strong> <em>Tidak diubah</em>';
    if (force) confirmHTML += '<br><strong>Security:</strong> WPA/WPA2';

    ddCloseSheet();
    ddOpenModal({
        title: 'Konfirmasi Update WiFi?',
        titleIcon: 'ph ph-wifi-high',
        headerColor: 'linear-gradient(135deg,#7c3aed,#6d28d9)',
        body: '<div style="padding:4px 0;">' + confirmHTML + '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-primary" onclick="ddCloseModal();ddDoUpdateWifi(\'' + ssid.replace(/'/g, "\\'") + '\',\'' + pass.replace(/'/g, "\\'") + '\',' + (force?'true':'false') + ')"><i class="ph ph-floppy-disk" style="font-size:13px;"></i> Yes, Update!</button>'
    });
}

function ddDoUpdateWifi(ssid, pass, force) {
    var texts = ['Contacting router...', 'Updating WiFi settings...', 'Saving configuration...'];
    ddOpenModal({
        title: 'Updating WiFi...',
        titleIcon: 'ph ph-wifi-high',
        headerColor: 'linear-gradient(135deg,#7c3aed,#6d28d9)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="dd-modal-spinner" style="border-top-color:#7c3aed;margin:0 auto 20px;"></div>' +
              '<p id="ddWifiText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + texts[0] + '</p>' +
              '</div>',
        footer: ''
    });
    var idx = 1; var done = false; var ajaxDone = false; var ajaxResult = null; var minDone = false;
    function nextText() {
        if (done) return;
        if (idx >= texts.length) idx = 0;
        var el = document.getElementById('ddWifiText');
        if (!el) return;
        el.style.opacity = '0';
        setTimeout(function() { var e = document.getElementById('ddWifiText'); if (e) { e.textContent = texts[idx]; e.style.opacity = '1'; } idx++; if (!done) setTimeout(nextText, 1800); }, 300);
    }
    setTimeout(nextText, 1800);
    setTimeout(function() { minDone = true; tryWifiResult(); }, 3000);
    $.ajax({
        url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/update-wifi',
        type: 'POST', data: { ssid: ssid, password: pass, force_security: force ? 1 : 0 }, dataType: 'json', timeout: 30000,
        success: function(r) { ajaxResult = r; ajaxDone = true; tryWifiResult(); },
        error:   function()  { ajaxResult = null; ajaxDone = true; tryWifiResult(); }
    });
    function tryWifiResult() {
        if (!ajaxDone || !minDone) return;
        done = true;
        if (ajaxResult && ajaxResult.success) {
            ddOpenModal({
                title: 'WiFi Diperbarui!',
                titleIcon: 'ph ph-check-circle',
                headerColor: 'linear-gradient(135deg,#16a34a,#15803d)',
                closable: false,
                body: '<div style="text-align:center;padding:8px 0;">' +
                      '<div class="dd-modal-spinner" style="border-top-color:#16a34a;margin:0 auto 16px;"></div>' +
                      '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 4px;">WiFi updated successfully!</p>' +
                      '<p style="font-size:12px;color:#64748b;margin:0;">Contacting the device to sync data...</p>' +
                      '</div>',
                footer: ''
            });
            ddAutoSummonAfterWifi(0);
        } else {
            ddShowError('Update Failed', (ajaxResult && ajaxResult.error) || 'Failed to update WiFi settings');
        }
    }
}

function ddAutoSummonAfterWifi(retryCount) {
    var maxRetries = 2;
    $.ajax({ url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/summon', type: 'GET', dataType: 'json', timeout: 30000,
        success: function(r) {
            if (r && r.success) {
                setTimeout(function() {
                    $.ajax({ url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/refresh', type: 'GET', dataType: 'json',
                        success: function() { ddShowSuccess('Done!', 'Reloading...'); setTimeout(function() { window.location.reload(true); }, 1500); },
                        error:   function() { ddShowSuccess('WiFi Updated', 'Sync failed. Reloading...'); setTimeout(function() { window.location.reload(true); }, 1500); }
                    });
                }, 8000);
            } else {
                if (retryCount < maxRetries) { setTimeout(function() { ddAutoSummonAfterWifi(retryCount + 1); }, 5000); }
                else { ddShowSuccess('WiFi Updated', 'Page will reload.'); setTimeout(function() { window.location.reload(true); }, 1500); }
            }
        },
        error: function() {
            if (retryCount < maxRetries) { setTimeout(function() { ddAutoSummonAfterWifi(retryCount + 1); }, 5000); }
            else { ddShowSuccess('WiFi Updated', 'Reloading...'); setTimeout(function() { window.location.reload(true); }, 1500); }
        }
    });
}

// ===================== TAGS SHEET =====================
function ddOpenTagsSheet() {
    var allTags = '{/literal}{$device.all_tags|default:""}{literal}';
    var tag1Val = '{/literal}{$device.tags|default:""}{literal}';
    var tag2Val = '{/literal}{$device.lokasi|default:""}{literal}';
    var t1 = '', t2 = '';
    if (allTags && allTags !== 'N/A' && allTags !== '') {
        var arr = allTags.split(',');
        t1 = arr.length > 0 ? arr[0].trim() : '';
        t2 = arr.length > 1 ? arr[1].trim() : '';
    } else {
        if (tag1Val && tag1Val !== 'N/A') t1 = tag1Val;
        if (tag2Val && tag2Val !== 'N/A') t2 = tag2Val;
    }
    ddOpenSheet({
        title: 'Edit Device Tags',
        icon: 'ph ph-tag',
        body: '<div class="bk-form-group">' +
              '<label class="bk-label"><i class="ph ph-user" style="font-size:10px;color:#0271c6;"></i> Username Tag *</label>' +
              '<input type="text" id="ts-tag1" class="bk-input" placeholder="Customer username" value="' + t1 + '">' +
              '</div>' +
              '<div class="bk-form-group">' +
              '<label class="bk-label"><i class="ph ph-map-pin" style="font-size:10px;color:#d97706;"></i> Lokasi Tag</label>' +
              '<input type="text" id="ts-tag2" class="bk-input" placeholder="Lokasi / area" value="' + t2 + '">' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseSheet()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-primary" onclick="ddSubmitTags()"><i class="ph ph-floppy-disk" style="font-size:13px;"></i> Simpan Tags</button>'
    });
}

function ddSubmitTags() {
    var t1 = document.getElementById('ts-tag1').value.trim();
    var t2 = document.getElementById('ts-tag2').value.trim();
    if (!t1) { alert('Username tag is required'); return; }
    var tags = [t1];
    if (t2) tags.push(t2);
    ddCloseSheet();
    ddShowLoading('Saving Tags...', 'Please wait');
    $.ajax({
        url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/update-tags',
        type: 'POST', data: { tags: tags }, dataType: 'json',
        success: function(r) {
            if (r && r.success) { ddShowSuccess('Tags Updated!', 'Reloading...'); setTimeout(function() { location.reload(); }, 1200); }
            else { ddShowError('Failed', r.error || 'Failed to save tags'); }
        },
        error: function() { ddShowError('Failed', 'Failed to communicate with the server'); }
    });
}

// ===================== ADMIN SHEET =====================
function ddOpenAdminSheet() {
    var su = '{/literal}{$web_admin.super_username|default:"admin"|escape:"javascript"}{literal}';
    var uu = '{/literal}{$web_admin.user_username|default:"user"|escape:"javascript"}{literal}';
    ddOpenSheet({
        title: 'Edit Web Admin Credentials',
        icon: 'ph ph-lock',
        body: '<div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">' +
              '<div class="bk-form-group"><label class="bk-label">Super Admin Username</label><input type="text" id="as-suser" class="bk-input" value="' + su + '"></div>' +
              '<div class="bk-form-group"><label class="bk-label">Super Admin Password</label><div class="bk-input-wrap"><input type="password" id="as-spass" class="bk-input" placeholder="Enter password"><button type="button" class="bk-eye-btn" onclick="ddToggleAsPass(\'as-spass\',\'as-spass-icon\')"><i class="ph ph-eye" id="as-spass-icon"></i></button></div></div>' +
              '<div class="bk-form-group"><label class="bk-label">User Username</label><input type="text" id="as-uuser" class="bk-input" value="' + uu + '"></div>' +
              '<div class="bk-form-group"><label class="bk-label">User Password</label><div class="bk-input-wrap"><input type="password" id="as-upass" class="bk-input" placeholder="Enter password"><button type="button" class="bk-eye-btn" onclick="ddToggleAsPass(\'as-upass\',\'as-upass-icon\')"><i class="ph ph-eye" id="as-upass-icon"></i></button></div></div>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseSheet()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-primary" onclick="ddSubmitAdmin()"><i class="ph ph-floppy-disk" style="font-size:13px;"></i> Update Credentials</button>'
    });
}

function ddToggleAsPass(inputId, iconId) {
    var i = document.getElementById(inputId);
    var ic = document.getElementById(iconId);
    if (i.type === 'password') { i.type = 'text'; ic.className = 'ph ph-eye-slash'; }
    else { i.type = 'password'; ic.className = 'ph ph-eye'; }
}

function ddSubmitAdmin() {
    var su = document.getElementById('as-suser').value.trim();
    var sp = document.getElementById('as-spass').value;
    var uu = document.getElementById('as-uuser').value.trim();
    var up = document.getElementById('as-upass').value;
    if (!su || !uu) { alert('Username cannot be empty'); return; }
    ddCloseSheet();
    ddOpenModal({
        title: 'Update Credentials?',
        titleIcon: 'ph ph-lock',
        headerColor: 'linear-gradient(135deg,#dc2626,#b91c1c)',
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div style="width:64px;height:64px;border-radius:16px;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#dc2626;">' +
              '<i class="ph ph-lock"></i></div>' +
              '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Update router login credentials?</p>' +
              '<p style="font-size:12px;color:#94a3b8;margin:0;">Pastikan username dan password sudah benar.</p>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="ddCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-danger" onclick="ddCloseModal();ddDoUpdateAdmin(\'' + su.replace(/'/g,"\\'") + '\',\'' + sp.replace(/'/g,"\\'") + '\',\'' + uu.replace(/'/g,"\\'") + '\',\'' + up.replace(/'/g,"\\'") + '\')"><i class="ph ph-floppy-disk" style="font-size:13px;"></i> Yes, Update!</button>'
    });
}

function ddDoUpdateAdmin(su, sp, uu, up) {
    ddShowLoading('Updating Credentials...', 'Please wait');
    $.ajax({
        url: ddBaseUrl + 'plugin/genieacs_device_detail/' + ddDeviceId + '/update-admin',
        type: 'POST',
        data: { super_username: su, super_password: sp, user_username: uu, user_password: up },
        dataType: 'json',
        success: function(r) {
            if (r && r.success) { ddShowSuccess('Credentials Updated!', 'Reloading...'); setTimeout(function() { location.reload(); }, 1200); }
            else { ddShowError('Failed', r.error || 'Failed to update credentials'); }
        },
        error: function() { ddShowError('Failed', 'Failed to communicate with the server'); }
    });
}
{/literal}
</script>

{include file="sections/footer.tpl"}
