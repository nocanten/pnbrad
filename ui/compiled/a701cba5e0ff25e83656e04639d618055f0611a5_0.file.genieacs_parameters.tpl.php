<?php
/* Smarty version 4.5.3, created on 2026-07-02 17:04:40
  from '/data/html/system/plugin/ui/genieacs_parameters.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4637b8bc1336_99763450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a701cba5e0ff25e83656e04639d618055f0611a5' => 
    array (
      0 => '/data/html/system/plugin/ui/genieacs_parameters.tpl',
      1 => 1778796844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a4637b8bc1336_99763450 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Tailwind CSS -->
<?php echo '<script'; ?>
 src="https://cdn.tailwindcss.com"><?php echo '</script'; ?>
>

<!-- Google Fonts: DM Sans + DM Mono -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<!-- Icons: Phosphor Icons (modern, clean) -->
<?php echo '<script'; ?>
 src="https://unpkg.com/@phosphor-icons/web@2.1.1/src/index.js"><?php echo '</script'; ?>
>
<!-- Network Mapping Custom CSS -->
<link rel="stylesheet" href="system/plugin/ui/css/network_mapping.css" />

<style>


/* ===================== GCS PARAMETERS — DESIGN SYSTEM (match genieacs_manager) ===================== */

/* ---- Base ---- */
* { box-sizing: border-box; }

/* ---- Header Card (title + action buttons) ---- */
.gp-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 16px 18px;
    border-bottom: 1px solid #f1f5f9;
    background: #fafcff;
    border-radius: 14px 14px 0 0;
    flex-wrap: nowrap;
}
.gp-page-header-left  { display: flex; align-items: center; gap: 10px; min-width: 0; flex: 1; }
.gp-page-header-left > div:last-child { min-width: 0; overflow: hidden; }
.gp-page-header-left .bk-card-title,
.gp-page-header-left .bk-card-subtitle { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.gp-page-header-right { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }

/* ---- Segment Card (desktop — fullwidth 4-col grid, match dashboard menu) ---- */
.gp-segment-wrap {
    padding: 16px 18px;
    border-bottom: 1px solid #f1f5f9;
    background: #fff;
}
.gp-segment {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    background: transparent;
    padding: 0;
}
/* Each desktop tab: full card, icon centered top, label below */
.gp-tab {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 14px 10px;
    font-size: 12px;
    font-weight: 600;
    font-family: 'DM Sans', sans-serif;
    color: #64748b;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.15s ease;
    white-space: nowrap;
    text-decoration: none;
}
.gp-tab:hover {
    color: #334155;
    background: #f1f5f9;
    border-color: #cbd5e1;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    text-decoration: none;
}
.gp-tab:active { transform: translateY(0); box-shadow: none; }
.gp-tab.active {
    background: #fff;
    border-color: #0271c6;
    box-shadow: 0 0 0 3px rgba(2,113,198,0.10), 0 2px 8px rgba(2,113,198,0.12);
    color: #0271c6;
}
/* Icon box inside each tab */
.gp-tab-icon {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
    flex-shrink: 0;
    transition: transform 0.15s;
}
.gp-tab:hover .gp-tab-icon { transform: scale(1.08); }
.gp-tab.active .gp-tab-icon { transform: scale(1.05); }
/* Active icon-box per tab — brighter when selected */
.gp-tab[data-target="basic"].active .gp-tab-icon  { background: #dbeafe !important; }
.gp-tab[data-target="wifi"].active .gp-tab-icon   { background: #dcfce7 !important; }
.gp-tab[data-target="webadmin"].active .gp-tab-icon { background: #fae8ff !important; }
.gp-tab[data-target="config"].active .gp-tab-icon { background: #ede9fe !important; }

/* Mobile fullwidth tab bar — hidden on desktop */
.gp-mobile-tabs {
    display: none;
}

/* ---- Tab Content ---- */
.tab-content { display: block; }
.tab-pane { display: none; }
.tab-pane.active { display: block; }

/* ---- Param Cards Grid ---- */
.gp-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 12px;
    padding: 18px;
}
.gp-card {
    position: relative;
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 12px;
    overflow: hidden;
    transition: box-shadow 0.15s, border-color 0.15s, transform 0.15s;
    font-family: 'DM Sans', sans-serif;
    box-shadow: 0 1px 2px rgba(15,23,42,0.03);
}
.gp-card::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 3px;
}
.gp-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    border-color: #94a3b8;
    transform: translateY(-1px);
}

/* Accent colors per tab pane */
#tab-basic .gp-card { background: linear-gradient(135deg, #fff 0%, #eff6ff 100%); }
#tab-basic .gp-card::before { background: linear-gradient(to bottom, #3b82f6, #1d4ed8); }
#tab-wifi .gp-card { background: linear-gradient(135deg, #fff 0%, #f0fdf4 100%); }
#tab-wifi .gp-card::before { background: linear-gradient(to bottom, #22c55e, #15803d); }
#tab-webadmin .gp-card { background: linear-gradient(135deg, #fff 0%, #fdf4ff 100%); }
#tab-webadmin .gp-card::before { background: linear-gradient(to bottom, #a855f7, #a21caf); }
#tab-config .gp-card { background: linear-gradient(135deg, #fff 0%, #f5f3ff 100%); }
#tab-config .gp-card::before { background: linear-gradient(to bottom, #8b5cf6, #7c3aed); }
.gp-card-top {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 14px 0 17px;
}
.gp-card-icon {
    width: 36px;
    height: 36px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 15px;
}
.gp-card-meta { flex: 1; min-width: 0; }
.gp-card-label {
    font-size: 13px;
    font-weight: 700;
    color: #0f172a;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.gp-card-key {
    font-size: 11px;
    color: #94a3b8;
    font-family: 'DM Mono', monospace;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.gp-card-btns {
    display: flex;
    gap: 5px;
    flex-shrink: 0;
}
.gp-card-body { padding: 12px 14px 12px 17px; }
.gp-path-wrap {
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.gp-path-label {
    font-size: 10px;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.gp-path-code {
    font-size: 11px;
    font-family: 'DM Mono', monospace;
    color: #0271c6;
    background: #eff6ff;
    border: 1px solid #dbeafe;
    border-radius: 6px;
    padding: 5px 9px;
    word-break: break-all;
    line-height: 1.5;
}
.gp-path-empty {
    font-size: 11px;
    font-style: italic;
    color: #cbd5e1;
}

/* Config card value */
.gp-config-value {
    font-size: 12px;
    font-weight: 600;
    color: #334155;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    padding: 6px 10px;
    word-break: break-all;
    line-height: 1.5;
}
.gp-config-empty {
    font-size: 11px;
    font-style: italic;
    color: #cbd5e1;
}
.gp-config-preview {
    margin-top: 6px;
    font-size: 11px;
    color: #64748b;
    display: flex;
    align-items: center;
    gap: 4px;
}
.gp-config-preview span { font-weight: 700; color: #0271c6; font-family: 'DM Mono', monospace; }

.gp-card-footer {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 5px;
    padding: 10px 14px 10px 17px;
    border-top: 1px solid #f1f5f9;
    background: rgba(250,252,255,0.6);
}

/* ---- Badges ---- */
.gp-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 2px 8px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
    font-family: 'DM Sans', sans-serif;
    letter-spacing: 0.02em;
    white-space: nowrap;
}
.gp-badge-display  { background: #dbeafe; color: #1d4ed8; }
.gp-badge-update   { background: #fef3c7; color: #d97706; }
.gp-badge-both     { background: #dcfce7; color: #15803d; }
.gp-badge-config   { background: #f5f3ff; color: #7c3aed; }
.gp-badge-required { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
.gp-badge-order    { background: #f1f5f9; color: #64748b; font-family: 'DM Mono', monospace; }
.gp-badge-2g       { background: #fef3c7; color: #d97706; }
.gp-badge-5g       { background: #ede9fe; color: #7c3aed; }

/* ---- Icon button small ---- */
.gp-icon-btn {
    width: 28px;
    height: 28px;
    border-radius: 7px;
    border: 1px solid #e2e8f0;
    background: #f8fafc;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    transition: all 0.12s;
}
.gp-icon-btn.edit  { color: #d97706; }
.gp-icon-btn.edit:hover  { background: #fef3c7; border-color: #fde68a; color: #d97706; }
.gp-icon-btn.del   { color: #dc2626; }
.gp-icon-btn.del:hover   { background: #fee2e2; border-color: #fecaca; color: #dc2626; }

/* ---- Advanced Table ---- */
.gp-table-wrap { overflow-x: auto; }
.gp-table { width: 100%; border-collapse: collapse; font-family: 'DM Sans', sans-serif; font-size: 13px; }
.gp-table thead tr { background: #f8fafc; border-bottom: 2px solid #e2e8f0; }
.gp-table thead th { padding: 10px 14px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #94a3b8; text-align: left; white-space: nowrap; }
.gp-table tbody tr { border-bottom: 1px solid #f1f5f9; transition: all 0.12s; }
.gp-table tbody tr:last-child { border-bottom: none; }
.gp-table tbody tr:hover { background: #f8fafc; box-shadow: inset 3px 0 0 #0271c6; }
.gp-table tbody td { padding: 11px 14px; color: #334155; vertical-align: middle; }
.gp-key-chip {
    display: inline-flex;
    align-items: center;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    color: #0271c6;
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    font-weight: 600;
    border-radius: 6px;
    padding: 3px 8px;
}
.gp-path-chip {
    display: inline-flex;
    align-items: center;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #334155;
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    border-radius: 6px;
    padding: 3px 8px;
    max-width: 260px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.gp-path-chip:hover { overflow: visible; white-space: normal; word-break: break-all; position: relative; z-index: 5; }
.gp-order-num {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    border-radius: 6px;
    background: #f1f5f9;
    color: #64748b;
    font-size: 11px;
    font-weight: 700;
    font-family: 'DM Mono', monospace;
}
.gp-req-yes { display: inline-flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: 50%; background: #dcfce7; color: #16a34a; font-size: 11px; }
.gp-req-no  { display: inline-flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: 50%; background: #f1f5f9; color: #94a3b8; font-size: 11px; }

/* ---- Empty State ---- */
.gp-empty {
    padding: 48px 24px;
    text-align: center;
    color: #94a3b8;
    font-family: 'DM Sans', sans-serif;
}
.gp-empty i { font-size: 40px; display: block; margin-bottom: 12px; color: #e2e8f0; }
.gp-empty p { font-size: 13px; margin: 0; }

/* ---- Modal ---- */
.gp-modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 9995;
    background: rgba(15,23,42,0.55);
    backdrop-filter: blur(3px);
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
}
.gp-modal-overlay.open { display: flex; }
.gp-modal-card {
    background: white;
    border-radius: 16px;
    width: 100%;
    max-width: 540px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    animation: gpModalIn 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
}
@keyframes gpModalIn { from { opacity:0; transform:translateY(-12px) scale(0.98); } to { opacity:1; transform:translateY(0) scale(1); } }
.gp-modal-header {
    padding: 18px 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-shrink: 0;
    background: linear-gradient(135deg, #0271c6, #0359a0);
    color: white;
}
.gp-modal-title { font-size: 15px; font-weight: 700; font-family: 'DM Sans', sans-serif; display: flex; align-items: center; gap: 8px; }
.gp-modal-close {
    width: 30px; height: 30px; border-radius: 8px; border: none;
    background: rgba(255,255,255,0.2); color: white; cursor: pointer;
    display: flex; align-items: center; justify-content: center; font-size: 16px;
    transition: background 0.15s; flex-shrink: 0;
}
.gp-modal-close:hover { background: rgba(255,255,255,0.3); }
.gp-modal-body { padding: 22px; overflow-y: auto; flex: 1; }
.gp-modal-footer {
    padding: 14px 22px; border-top: 1px solid #f1f5f9;
    display: flex; gap: 8px; justify-content: stretch;
    flex-shrink: 0; background: #fafcff;
}
.gp-modal-footer .bk-btn { flex: 1 1 0; justify-content: center; }

/* ---- Form inside modal ---- */
.gp-section-title {
    font-size: 10px; font-weight: 700; color: #64748b;
    text-transform: uppercase; letter-spacing: 0.07em;
    display: flex; align-items: center; gap: 6px;
    padding-bottom: 10px; border-bottom: 1px solid #f1f5f9; margin-bottom: 14px;
}
.gp-form-group { display: flex; flex-direction: column; gap: 5px; margin-bottom: 16px; }
.gp-form-group:last-child { margin-bottom: 0; }
.gp-label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; }
.gp-help  { font-size: 11px; color: #94a3b8; line-height: 1.5; margin-top: 3px; }

/* Radio card grid for category & type */
.gp-radio-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
}
.gp-radio-card { cursor: pointer; }
.gp-radio-card input[type="radio"] { display: none; }
.gp-radio-content {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background: #f8fafc;
    font-size: 12px;
    font-weight: 600;
    font-family: 'DM Sans', sans-serif;
    color: #475569;
    transition: all 0.12s;
}
.gp-radio-content i { font-size: 14px; color: #94a3b8; }
.gp-radio-card input[type="radio"]:checked + .gp-radio-content {
    border-color: #0271c6;
    background: #eff6ff;
    color: #0271c6;
}
.gp-radio-card input[type="radio"]:checked + .gp-radio-content i { color: #0271c6; }

/* Path hints */
.gp-path-hints { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 8px; }
.gp-hint-chip {
    display: inline-flex; align-items: center; gap: 4px;
    padding: 4px 10px; border-radius: 6px; font-size: 11px;
    font-weight: 600; background: #f1f5f9; border: 1px solid #e2e8f0;
    color: #475569; cursor: pointer; font-family: 'DM Mono', monospace;
    transition: all 0.12s;
}
.gp-hint-chip:hover { background: #eff6ff; border-color: #bfdbfe; color: #0271c6; }

/* Checkbox toggle style */
.gp-check-row { display: flex; align-items: center; gap: 8px; cursor: pointer; }
.gp-check-row input[type="checkbox"] { display: none; }
.gp-check-box {
    width: 18px; height: 18px; border-radius: 5px;
    border: 2px solid #e2e8f0; background: #f8fafc;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; transition: all 0.12s;
}
.gp-check-row input:checked + .gp-check-box {
    background: #0271c6; border-color: #0271c6; color: white;
}
.gp-check-label { font-size: 13px; font-weight: 600; color: #0f172a; }

/* ---- bk-* reuse from dashboard ---- */
.bk-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; font-family: 'DM Sans', sans-serif; margin-bottom: 16px; }
.bk-card-header { display: flex; align-items: center; gap: 10px; padding: 14px 18px; border-bottom: 1px solid #f1f5f9; background: #fafcff; }
.bk-card-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.bk-card-title { font-size: 13px; font-weight: 700; color: #0f172a; }
.bk-card-subtitle { font-size: 11px; color: #94a3b8; }
.bk-input { width: 100%; height: 36px; padding: 0 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #0f172a; background: #f8fafc; outline: none; transition: border-color 0.15s, box-shadow 0.15s; box-sizing: border-box; }
.bk-input:focus { border-color: #0271c6; background: #fff; box-shadow: 0 0 0 3px rgba(2,113,198,0.10); }
.bk-input::placeholder { color: #cbd5e1; }
.bk-btn { display: inline-flex; align-items: center; justify-content: center; gap: 6px; height: 36px; padding: 0 16px; border-radius: 8px; font-size: 13px; font-weight: 600; font-family: 'DM Sans', sans-serif; cursor: pointer; border: none; transition: all 0.15s; text-decoration: none; white-space: nowrap; box-sizing: border-box; }
.bk-btn-primary { background: #0271c6; color: white; box-shadow: 0 2px 8px rgba(2,113,198,0.25); }
.bk-btn-primary:hover { background: #0359a0; color: white; text-decoration: none; }
.bk-btn-ghost { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
.bk-btn-ghost:hover { background: #e2e8f0; color: #0f172a; text-decoration: none; }
.bk-btn-danger { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
.bk-btn-danger:hover { background: #fecaca; color: #dc2626; text-decoration: none; }
.bk-btn-sm { height: 30px; padding: 0 12px; font-size: 12px; border-radius: 6px; }

/* Swal override */
.swal2-container { z-index: 999999 !important; }
html.modal-open { overflow: hidden; }

/* ---- GP Alert/Confirm Modal (replaces SweetAlert) ---- */
#gpAlertOverlay { position:fixed;inset:0;z-index:99998;background:rgba(15,23,42,0);backdrop-filter:blur(0px);display:none;align-items:center;justify-content:center;padding:16px;transition:background 0.3s,backdrop-filter 0.3s; }
#gpAlertOverlay.open { display:flex;background:rgba(15,23,42,0.55);backdrop-filter:blur(3px); }
#gpAlertCard { background:#fff;border-radius:16px;width:100%;max-width:400px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.2);animation:gpModalIn 0.25s cubic-bezier(0.34,1.56,0.64,1);text-align:center;padding:28px 24px 20px; }
.gp-alert-icon { width:56px;height:56px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:24px; }
.gp-alert-icon.success { background:#dcfce7;color:#16a34a; }
.gp-alert-icon.error { background:#fee2e2;color:#dc2626; }
.gp-alert-icon.warning { background:#fef3c7;color:#d97706; }
.gp-alert-icon.info { background:#dbeafe;color:#0271c6; }
.gp-alert-title { font-size:16px;font-weight:700;color:#0f172a;margin-bottom:6px; }
.gp-alert-text { font-size:13px;color:#64748b;line-height:1.6;margin-bottom:18px; }
.gp-alert-actions { display:flex;gap:8px;justify-content:stretch; }
.gp-alert-actions .bk-btn { flex:1 1 0;justify-content:center; }

/* ===================== MOBILE ===================== */
@media (max-width: 767px) {

    /* Hide desktop segment, show mobile fullwidth tabs */
    .gp-segment-wrap { display: none; }
    .gp-mobile-tabs {
        display: flex;
        border-bottom: 2px solid #f1f5f9;
        background: #fff;
    }
    .gp-mobile-tab {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 12px 4px 10px;
        font-family: 'DM Sans', sans-serif;
        font-size: 10px;
        font-weight: 700;
        color: #94a3b8;
        background: transparent;
        border: none;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        cursor: pointer;
        transition: all 0.15s;
        line-height: 1.2;
        text-align: center;
        letter-spacing: 0.01em;
    }
    /* Mobile tab icon box */
    .gp-mobile-tab .gp-mtab-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: transform 0.15s;
        background: #f1f5f9;
        color: #94a3b8;
    }
    .gp-mobile-tab:hover .gp-mtab-icon { transform: scale(1.05); }
    .gp-mobile-tab.active { color: #0271c6; border-bottom-color: #0271c6; }
    .gp-mobile-tab.active .gp-mtab-icon { transform: scale(1.08); }

    /* Active icon-box per tab — brighter bg when active */
    .gp-mobile-tab[data-target="basic"].active .gp-mtab-icon  { background: #dbeafe !important; color: #0271c6 !important; }
    .gp-mobile-tab[data-target="wifi"].active .gp-mtab-icon   { background: #dcfce7 !important; color: #16a34a !important; }
    .gp-mobile-tab[data-target="webadmin"].active .gp-mtab-icon { background: #fae8ff !important; color: #a21caf !important; }
    .gp-mobile-tab[data-target="config"].active .gp-mtab-icon { background: #ede9fe !important; color: #7c3aed !important; }

    /* Header action buttons: icon only on mobile */
    .gp-page-header-right .bk-btn span { display: none; }
    .gp-page-header-right .bk-btn { padding: 0 10px; }

    /* Cards 1 column */
    .gp-cards-grid { grid-template-columns: 1fr; padding: 12px; gap: 10px; }

    /* Modal slide up */
    .gp-modal-overlay { align-items: flex-end !important; padding: 0; }
    .gp-modal-card {
        border-radius: 20px 20px 0 0;
        max-height: 92vh;
        max-width: 100%;
        animation: gpModalSlideUp 0.35s cubic-bezier(0.32, 0.72, 0, 1);
    }
    @keyframes gpModalSlideUp {
        from { transform: translateY(100%); opacity: 0.6; }
        to   { transform: translateY(0);    opacity: 1; }
    }
    .gp-modal-header { padding: 16px 18px; }
    .gp-modal-body { padding: 16px 18px; -webkit-overflow-scrolling: touch; overscroll-behavior: contain; }
    .gp-modal-footer { padding: 12px 18px; flex-direction: column-reverse; }
    .gp-modal-footer .bk-btn { width: 100%; justify-content: center; }
    .gp-radio-grid { grid-template-columns: 1fr 1fr; }

    /* Alert modal mobile */
    #gpAlertCard { max-width:100%;border-radius:20px 20px 0 0;position:fixed;bottom:0;left:0;right:0;animation:gpModalSlideUp 0.35s cubic-bezier(0.32,0.72,0,1); }
    #gpAlertOverlay { align-items:flex-end !important;padding:0; }
    .gp-alert-actions { flex-direction:column-reverse; }
    .gp-alert-actions .bk-btn { width:100%;justify-content:center; }

    /* Table scroll */
    .gp-table-wrap { overflow-x: auto; }

    .bk-card { border-radius: 12px; }
    .bk-card-header { padding: 12px 14px; }
}


</style>

<!-- ===================== HERO HEADER ===================== -->
<div class="bk-card" style="margin-bottom:16px;">
    <div style="display:flex;align-items:center;gap:18px;padding:20px 22px;background:linear-gradient(135deg,#fff 0%,#fffbeb 55%,#fef3c7 100%);position:relative;overflow:hidden;">
        <div style="position:absolute;top:-40px;right:-40px;width:180px;height:180px;border-radius:50%;background:radial-gradient(circle,rgba(217,119,6,0.10) 0%,transparent 70%);pointer-events:none;"></div>
        <div style="width:56px;height:56px;border-radius:14px;background:linear-gradient(135deg,#d97706,#f59e0b);display:flex;align-items:center;justify-content:center;color:#fff;flex-shrink:0;box-shadow:0 6px 16px rgba(217,119,6,0.25);z-index:1;">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/>
                <line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/>
                <line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/>
                <line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/>
            </svg>
        </div>
        <div style="min-width:0;flex:1;z-index:1;">
            <div style="font-size:20px;font-weight:800;color:#0f172a;line-height:1.15;">Parameter Configuration</div>
            <div style="font-size:13px;color:#64748b;margin-top:4px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                <span style="display:inline-flex;align-items:center;gap:5px;">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
                    <?php $_smarty_tpl->_assignInScope('total_params', 0);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['grouped_params']->value, 'params', false, 'cat');
$_smarty_tpl->tpl_vars['params']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value => $_smarty_tpl->tpl_vars['params']->value) {
$_smarty_tpl->tpl_vars['params']->do_else = false;
$_smarty_tpl->_assignInScope('total_params', $_smarty_tpl->tpl_vars['total_params']->value+count($_smarty_tpl->tpl_vars['params']->value));
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php echo $_smarty_tpl->tpl_vars['total_params']->value;?>
 parameter<?php if ($_smarty_tpl->tpl_vars['total_params']->value != 1) {?>s<?php }?>
                </span>
                <span style="display:inline-flex;align-items:center;gap:5px;">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#0271c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h18v18H3z"/><path d="M3 9h18"/><path d="M9 3v18"/></svg>
                    <?php echo count($_smarty_tpl->tpl_vars['grouped_params']->value);?>
 categor<?php if (count($_smarty_tpl->tpl_vars['grouped_params']->value) != 1) {?>ies<?php } else { ?>y<?php }?>
                </span>
            </div>
        </div>
    </div>
</div>

<!-- ===================== PAGE WRAPPER ===================== -->
<div class="bk-card" style="margin-bottom:16px;overflow:visible;">

    <!-- ===================== PAGE HEADER ===================== -->
    <div class="gp-page-header">
        <div class="gp-page-header-left">
            <div class="bk-card-icon" style="background:linear-gradient(135deg,#fef3c7,#fde68a);">
                <i class="ph ph-sliders-horizontal" style="font-size:16px;color:#d97706;"></i>
            </div>
            <div>
                <div class="bk-card-title" style="font-size:14px;">Parameter Configuration</div>
                <div class="bk-card-subtitle">Mapping &amp; configuration</div>
            </div>
        </div>
        <div class="gp-page-header-right">
            <button class="bk-btn bk-btn-ghost bk-btn-sm"
                onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_manager'">
                <i class="ph ph-hard-drives" style="font-size:13px;"></i>
                <span>Manage Servers</span>
            </button>
            <button class="bk-btn bk-btn-primary bk-btn-sm" onclick="showAddModal()">
                <i class="ph ph-plus" style="font-size:13px;"></i>
                <span>Add Parameter</span>
            </button>
        </div>
    </div>

    <!-- ===================== DESKTOP SEGMENT CONTROL ===================== -->
    <div class="gp-segment-wrap">
        <div class="gp-segment" id="gpSegment">
            <button class="gp-tab active" data-target="basic" onclick="switchTab(this,'basic')">
                <div class="gp-tab-icon" style="background:#eff6ff;">
                    <i class="ph ph-monitor" style="color:#0271c6;"></i>
                </div>
                Basic Config
            </button>
            <button class="gp-tab" data-target="wifi" onclick="switchTab(this,'wifi')">
                <div class="gp-tab-icon" style="background:#f0fdf4;">
                    <i class="ph ph-wifi-high" style="color:#16a34a;"></i>
                </div>
                WiFi
            </button>
            <button class="gp-tab" data-target="webadmin" onclick="switchTab(this,'webadmin')">
                <div class="gp-tab-icon" style="background:#fdf4ff;">
                    <i class="ph ph-lock" style="color:#a21caf;"></i>
                </div>
                Web Admin
            </button>
            <button class="gp-tab" data-target="config" onclick="switchTab(this,'config')">
                <div class="gp-tab-icon" style="background:#f5f3ff;">
                    <i class="ph ph-gear" style="color:#7c3aed;"></i>
                </div>
                Config
            </button>
        </div>
    </div>

    <!-- ===================== MOBILE FULLWIDTH TAB BAR ===================== -->
    <div class="gp-mobile-tabs" id="gpMobileTabs">
        <button class="gp-mobile-tab active" data-target="basic" onclick="switchTab(this,'basic')">
            <div class="gp-mtab-icon" style="background:#eff6ff;color:#0271c6;">
                <i class="ph ph-monitor"></i>
            </div>
            <span>Basic</span>
        </button>
        <button class="gp-mobile-tab" data-target="wifi" onclick="switchTab(this,'wifi')">
            <div class="gp-mtab-icon" style="background:#f0fdf4;color:#16a34a;">
                <i class="ph ph-wifi-high"></i>
            </div>
            <span>WiFi</span>
        </button>
        <button class="gp-mobile-tab" data-target="webadmin" onclick="switchTab(this,'webadmin')">
            <div class="gp-mtab-icon" style="background:#fdf4ff;color:#a21caf;">
                <i class="ph ph-lock"></i>
            </div>
            <span>WebAdmin</span>
        </button>
        <button class="gp-mobile-tab" data-target="config" onclick="switchTab(this,'config')">
            <div class="gp-mtab-icon" style="background:#f5f3ff;color:#7c3aed;">
                <i class="ph ph-gear"></i>
            </div>
            <span>Config</span>
        </button>
    </div>

    <!-- ===================== TAB CONTENT ===================== -->
    <div class="tab-content">

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['grouped_params']->value, 'params', false, 'category');
$_smarty_tpl->tpl_vars['params']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value => $_smarty_tpl->tpl_vars['params']->value) {
$_smarty_tpl->tpl_vars['params']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['category']->value != 'advanced') {?>

        <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['category']->value == 'basic') {?>active<?php }?>" id="tab-<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
">

                        <?php if ($_smarty_tpl->tpl_vars['category']->value == 'config') {?>
                <div class="gp-cards-grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                    <div class="gp-card">
                        <div class="gp-card-top">
                            <div class="gp-card-icon" style="background:#f5f3ff;">
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'ssid_prefix_2g' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'ssid_prefix_5g') {?>
                                    <i class="ph ph-wifi-high" style="color:#7c3aed;"></i>
                                <?php } else { ?>
                                    <i class="ph ph-gear" style="color:#7c3aed;"></i>
                                <?php }?>
                            </div>
                            <div class="gp-card-meta">
                                <div class="gp-card-label"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
</div>
                                <div class="gp-card-key"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
</div>
                            </div>
                            <div class="gp-card-btns">
                                <button class="gp-icon-btn edit"
                                    onclick="editParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
', '<?php echo strtr((string)$_smarty_tpl->tpl_vars['param']->value->param_path, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_category;?>
', <?php echo $_smarty_tpl->tpl_vars['param']->value->is_required;?>
, <?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
)"
                                    title="Edit">
                                    <i class="ph ph-pencil-simple"></i>
                                </button>
                            </div>
                        </div>
                        <div class="gp-card-body">
                            <div class="gp-path-wrap">
                                <div class="gp-path-label">Current Value</div>
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_path) {?>
                                    <div class="gp-config-value"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_path;?>
</div>
                                    <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'ssid_prefix_2g' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'ssid_prefix_5g') {?>
                                    <div class="gp-config-preview">
                                        <i class="ph ph-eye" style="font-size:11px;"></i>
                                        Preview: <span><?php echo $_smarty_tpl->tpl_vars['param']->value->param_path;?>
YourSSID</span>
                                    </div>
                                    <?php }?>
                                <?php } else { ?>
                                    <div class="gp-config-empty">Not set (Disabled)</div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="gp-card-footer">
                            <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'ssid_prefix_2g') {?>
                                <span class="gp-badge gp-badge-2g"><i class="ph ph-wifi-high"></i> 2.4 GHz</span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'ssid_prefix_5g') {?>
                                <span class="gp-badge gp-badge-5g"><i class="ph ph-wifi-high"></i> 5 GHz</span>
                            <?php }?>
                            <span class="gp-badge gp-badge-order">#<?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
</span>
                        </div>
                    </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (count($_smarty_tpl->tpl_vars['params']->value) == 0) {?>
                    <div class="gp-empty" style="grid-column:1/-1;">
                        <i class="ph ph-gear"></i>
                        <p>No config parameters yet</p>
                    </div>
                    <?php }?>
                </div>

                        <?php } elseif ($_smarty_tpl->tpl_vars['category']->value == 'basic') {?>
                <div class="gp-cards-grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                    <div class="gp-card">
                        <div class="gp-card-top">
                            <div class="gp-card-icon" style="background:#eff6ff;">
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'device_manufacturer') {?>
                                    <i class="ph ph-factory" style="color:#0271c6;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'device_model') {?>
                                    <i class="ph ph-cube" style="color:#0271c6;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'device_serial') {?>
                                    <i class="ph ph-barcode" style="color:#0271c6;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'software_version') {?>
                                    <i class="ph ph-git-branch" style="color:#0271c6;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'hardware_version') {?>
                                    <i class="ph ph-cpu" style="color:#0271c6;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'uptime') {?>
                                    <i class="ph ph-clock" style="color:#0271c6;"></i>
                                <?php } else { ?>
                                    <i class="ph ph-info" style="color:#0271c6;"></i>
                                <?php }?>
                            </div>
                            <div class="gp-card-meta">
                                <div class="gp-card-label"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
</div>
                                <div class="gp-card-key"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
</div>
                            </div>
                            <div class="gp-card-btns">
                                <button class="gp-icon-btn edit"
                                    onclick="editParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
', '<?php echo strtr((string)$_smarty_tpl->tpl_vars['param']->value->param_path, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_category;?>
', <?php echo $_smarty_tpl->tpl_vars['param']->value->is_required;?>
, <?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
)"
                                    title="Edit"><i class="ph ph-pencil-simple"></i></button>
                                <?php if (!$_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                <button class="gp-icon-btn del"
                                    onclick="deleteParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
')"
                                    title="Delete"><i class="ph ph-trash"></i></button>
                                <?php }?>
                            </div>
                        </div>
                        <div class="gp-card-body">
                            <div class="gp-path-wrap">
                                <div class="gp-path-label">GenieACS Path</div>
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_path) {?>
                                    <div class="gp-path-code"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_path;?>
</div>
                                <?php } else { ?>
                                    <div class="gp-path-empty">No path set</div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="gp-card-footer">
                            <span class="gp-badge gp-badge-<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
">
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_type == 'display') {?><i class="ph ph-eye"></i> Display
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'update') {?><i class="ph ph-pencil-simple"></i> Update
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'config') {?><i class="ph ph-gear"></i> Config
                                <?php } else { ?><i class="ph ph-arrows-left-right"></i> Both<?php }?>
                            </span>
                            <?php if ($_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                <span class="gp-badge gp-badge-required"><i class="ph ph-check-circle"></i> Required</span>
                            <?php }?>
                            <span class="gp-badge gp-badge-order">#<?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
</span>
                        </div>
                    </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (count($_smarty_tpl->tpl_vars['params']->value) == 0) {?>
                    <div class="gp-empty" style="grid-column:1/-1;">
                        <i class="ph ph-monitor"></i><p>No basic parameters yet</p>
                    </div>
                    <?php }?>
                </div>

                        <?php } elseif ($_smarty_tpl->tpl_vars['category']->value == 'wifi') {?>
                <div class="gp-cards-grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                    <div class="gp-card">
                        <div class="gp-card-top">
                            <div class="gp-card-icon" style="background:#f0fdf4;">
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_ssid_2g' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_ssid_5g') {?>
                                    <i class="ph ph-wifi-high" style="color:#16a34a;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_password') {?>
                                    <i class="ph ph-key" style="color:#16a34a;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_channel_2g' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_channel_5g') {?>
                                    <i class="ph ph-sliders-horizontal" style="color:#16a34a;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_security_2g' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_security_5g') {?>
                                    <i class="ph ph-shield-check" style="color:#16a34a;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_enabled_2g' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'wifi_enabled_5g') {?>
                                    <i class="ph ph-toggle-right" style="color:#16a34a;"></i>
                                <?php } else { ?>
                                    <i class="ph ph-wifi-high" style="color:#16a34a;"></i>
                                <?php }?>
                            </div>
                            <div class="gp-card-meta">
                                <div class="gp-card-label"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
</div>
                                <div class="gp-card-key"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
</div>
                            </div>
                            <div class="gp-card-btns">
                                <button class="gp-icon-btn edit"
                                    onclick="editParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
', '<?php echo strtr((string)$_smarty_tpl->tpl_vars['param']->value->param_path, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_category;?>
', <?php echo $_smarty_tpl->tpl_vars['param']->value->is_required;?>
, <?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
)"
                                    title="Edit"><i class="ph ph-pencil-simple"></i></button>
                                <?php if (!$_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                <button class="gp-icon-btn del"
                                    onclick="deleteParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
')"
                                    title="Delete"><i class="ph ph-trash"></i></button>
                                <?php }?>
                            </div>
                        </div>
                        <div class="gp-card-body">
                            <div class="gp-path-wrap">
                                <div class="gp-path-label">GenieACS Path</div>
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_path) {?>
                                    <div class="gp-path-code"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_path;?>
</div>
                                <?php } else { ?>
                                    <div class="gp-path-empty">No path set</div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="gp-card-footer">
                            <span class="gp-badge gp-badge-<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
">
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_type == 'display') {?><i class="ph ph-eye"></i> Display
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'update') {?><i class="ph ph-pencil-simple"></i> Update
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'config') {?><i class="ph ph-gear"></i> Config
                                <?php } else { ?><i class="ph ph-arrows-left-right"></i> Both<?php }?>
                            </span>
                            <?php if ($_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                <span class="gp-badge gp-badge-required"><i class="ph ph-check-circle"></i> Required</span>
                            <?php }?>
                            <?php if (strpos($_smarty_tpl->tpl_vars['param']->value->param_key,'2g') !== false) {?>
                                <span class="gp-badge gp-badge-2g">2.4 GHz</span>
                            <?php } elseif (strpos($_smarty_tpl->tpl_vars['param']->value->param_key,'5g') !== false) {?>
                                <span class="gp-badge gp-badge-5g">5 GHz</span>
                            <?php }?>
                            <span class="gp-badge gp-badge-order">#<?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
</span>
                        </div>
                    </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (count($_smarty_tpl->tpl_vars['params']->value) == 0) {?>
                    <div class="gp-empty" style="grid-column:1/-1;">
                        <i class="ph ph-wifi-high"></i><p>No WiFi parameters yet</p>
                    </div>
                    <?php }?>
                </div>

                        <?php } elseif ($_smarty_tpl->tpl_vars['category']->value == 'webadmin') {?>
                <div class="gp-cards-grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                    <div class="gp-card">
                        <div class="gp-card-top">
                            <div class="gp-card-icon" style="background:#fdf4ff;">
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'admin_username' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'webadmin_username') {?>
                                    <i class="ph ph-user-circle" style="color:#a21caf;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'admin_password' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'webadmin_password') {?>
                                    <i class="ph ph-key" style="color:#a21caf;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'admin_url' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'webadmin_url') {?>
                                    <i class="ph ph-link" style="color:#a21caf;"></i>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_key == 'admin_port' || $_smarty_tpl->tpl_vars['param']->value->param_key == 'webadmin_port') {?>
                                    <i class="ph ph-plug" style="color:#a21caf;"></i>
                                <?php } elseif (strpos($_smarty_tpl->tpl_vars['param']->value->param_key,'remote') !== false) {?>
                                    <i class="ph ph-cloud" style="color:#a21caf;"></i>
                                <?php } else { ?>
                                    <i class="ph ph-lock" style="color:#a21caf;"></i>
                                <?php }?>
                            </div>
                            <div class="gp-card-meta">
                                <div class="gp-card-label"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
</div>
                                <div class="gp-card-key"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
</div>
                            </div>
                            <div class="gp-card-btns">
                                <button class="gp-icon-btn edit"
                                    onclick="editParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
', '<?php echo strtr((string)$_smarty_tpl->tpl_vars['param']->value->param_path, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_category;?>
', <?php echo $_smarty_tpl->tpl_vars['param']->value->is_required;?>
, <?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
)"
                                    title="Edit"><i class="ph ph-pencil-simple"></i></button>
                                <?php if (!$_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                <button class="gp-icon-btn del"
                                    onclick="deleteParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
')"
                                    title="Delete"><i class="ph ph-trash"></i></button>
                                <?php }?>
                            </div>
                        </div>
                        <div class="gp-card-body">
                            <div class="gp-path-wrap">
                                <div class="gp-path-label">GenieACS Path</div>
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_path) {?>
                                    <div class="gp-path-code"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_path;?>
</div>
                                <?php } else { ?>
                                    <div class="gp-path-empty">No path set</div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="gp-card-footer">
                            <span class="gp-badge gp-badge-<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
">
                                <?php if ($_smarty_tpl->tpl_vars['param']->value->param_type == 'display') {?><i class="ph ph-eye"></i> Display
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'update') {?><i class="ph ph-pencil-simple"></i> Update
                                <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'config') {?><i class="ph ph-gear"></i> Config
                                <?php } else { ?><i class="ph ph-arrows-left-right"></i> Both<?php }?>
                            </span>
                            <?php if ($_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                <span class="gp-badge gp-badge-required"><i class="ph ph-check-circle"></i> Required</span>
                            <?php }?>
                            <span class="gp-badge gp-badge-order">#<?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
</span>
                        </div>
                    </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (count($_smarty_tpl->tpl_vars['params']->value) == 0) {?>
                    <div class="gp-empty" style="grid-column:1/-1;">
                        <i class="ph ph-lock"></i><p>No web admin parameters yet</p>
                    </div>
                    <?php }?>
                </div>

                        <?php } else { ?>
                <div class="gp-table-wrap">
                    <table class="gp-table">
                        <thead>
                            <tr>
                                <th style="width:44px;text-align:center;">#</th>
                                <th>Parameter Key</th>
                                <th>Display Label</th>
                                <th>GenieACS Path</th>
                                <th style="width:110px;text-align:center;">Type</th>
                                <th style="width:80px;text-align:center;">Required</th>
                                <th style="width:90px;text-align:right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                            <tr>
                                <td style="text-align:center;"><span class="gp-order-num"><?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
</span></td>
                                <td><span class="gp-key-chip"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
</span></td>
                                <td style="font-size:13px;font-weight:600;color:#0f172a;"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
</td>
                                <td><span class="gp-path-chip" title="<?php echo $_smarty_tpl->tpl_vars['param']->value->param_path;?>
"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_path;?>
</span></td>
                                <td style="text-align:center;">
                                    <span class="gp-badge gp-badge-<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['param']->value->param_type == 'display') {?><i class="ph ph-eye"></i> Display
                                        <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'update') {?><i class="ph ph-pencil-simple"></i> Update
                                        <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_type == 'config') {?><i class="ph ph-gear"></i> Config
                                        <?php } else { ?><i class="ph ph-arrows-left-right"></i> Both<?php }?>
                                    </span>
                                </td>
                                <td style="text-align:center;">
                                    <?php if ($_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                        <span class="gp-req-yes"><i class="ph ph-check"></i></span>
                                    <?php } else { ?>
                                        <span class="gp-req-no"><i class="ph ph-minus"></i></span>
                                    <?php }?>
                                </td>
                                <td style="text-align:right;">
                                    <div style="display:flex;gap:5px;justify-content:flex-end;">
                                        <button class="gp-icon-btn edit"
                                            onclick="editParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_key;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
', '<?php echo strtr((string)$_smarty_tpl->tpl_vars['param']->value->param_path, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_type;?>
', '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_category;?>
', <?php echo $_smarty_tpl->tpl_vars['param']->value->is_required;?>
, <?php echo $_smarty_tpl->tpl_vars['param']->value->display_order;?>
)"
                                            title="Edit"><i class="ph ph-pencil-simple"></i></button>
                                        <?php if (!$_smarty_tpl->tpl_vars['param']->value->is_required) {?>
                                        <button class="gp-icon-btn del"
                                            onclick="deleteParameter(<?php echo $_smarty_tpl->tpl_vars['param']->value->id;?>
, '<?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
')"
                                            title="Delete"><i class="ph ph-trash"></i></button>
                                        <?php }?>
                                    </div>
                                </td>
                            </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                    <?php if (count($_smarty_tpl->tpl_vars['params']->value) == 0) {?>
                    <div class="gp-empty"><i class="ph ph-tray"></i><p>No parameters in this category</p></div>
                    <?php }?>
                </div>
            <?php }?>

        </div>
        <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </div>
</div>

<!-- ===================== ALERT/CONFIRM MODAL (replaces SweetAlert) ===================== -->
<div id="gpAlertOverlay">
    <div id="gpAlertCard"></div>
</div>

<!-- ===================== MODAL ADD / EDIT PARAMETER ===================== -->
<div class="gp-modal-overlay" id="parameterModalOverlay">
    <div class="gp-modal-card">

        <!-- Header -->
        <div class="gp-modal-header">
            <div class="gp-modal-title" id="modalTitle">
                <i class="ph ph-plus-circle"></i> Add Parameter
            </div>
            <button class="gp-modal-close" onclick="closeParameterModal()">
                <i class="ph ph-x"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="gp-modal-body">
            <form id="parameterForm" method="POST" action="">
                <input type="hidden" id="param_id" name="id" value="0">

                <!-- Section: Basic Info -->
                <div class="gp-section-title">
                    <i class="ph ph-info" style="font-size:13px;"></i> Basic Information
                </div>

                <div class="gp-form-group">
                    <label class="gp-label">Parameter Key <span style="color:#dc2626;">*</span></label>
                    <input type="text" class="bk-input" id="param_key" name="param_key"
                        placeholder="e.g. device_model" required
                        pattern="[a-z0-9_]+" title="Lowercase letters, numbers and underscore only">
                    <div class="gp-help">Unique identifier — lowercase, numbers, underscore only</div>
                </div>

                <div class="gp-form-group">
                    <label class="gp-label">Display Label <span style="color:#dc2626;">*</span></label>
                    <input type="text" class="bk-input" id="param_label" name="param_label"
                        placeholder="e.g. Device Model" required>
                </div>

                <div class="gp-form-group" style="margin-bottom:20px;">
                    <label class="gp-label">Display Order</label>
                    <input type="number" class="bk-input" id="display_order" name="display_order"
                        value="0" min="0" placeholder="0" style="width:120px;">
                    <div class="gp-help">Lower number = shown higher in the list</div>
                </div>

                <hr style="border:none;border-top:1px solid #f1f5f9;margin:0 0 18px;">

                <!-- Section: Category & Type -->
                <div class="gp-section-title">
                    <i class="ph ph-folder-open" style="font-size:13px;"></i> Category &amp; Type
                </div>

                <div class="gp-form-group">
                    <label class="gp-label">Category <span style="color:#dc2626;">*</span></label>
                    <div class="gp-radio-grid">
                        <label class="gp-radio-card">
                            <input type="radio" name="param_category" value="basic" checked>
                            <div class="gp-radio-content">
                                <i class="ph ph-monitor"></i> Basic
                            </div>
                        </label>
                        <label class="gp-radio-card">
                            <input type="radio" name="param_category" value="wifi">
                            <div class="gp-radio-content">
                                <i class="ph ph-wifi-high"></i> WiFi
                            </div>
                        </label>
                        <label class="gp-radio-card">
                            <input type="radio" name="param_category" value="webadmin">
                            <div class="gp-radio-content">
                                <i class="ph ph-lock"></i> WebAdmin
                            </div>
                        </label>
                        <label class="gp-radio-card">
                            <input type="radio" name="param_category" value="config">
                            <div class="gp-radio-content">
                                <i class="ph ph-gear"></i> Config
                            </div>
                        </label>
                    </div>
                </div>

                <div class="gp-form-group">
                    <label class="gp-label">Parameter Type <span style="color:#dc2626;">*</span></label>
                    <div class="gp-radio-grid">
                        <label class="gp-radio-card">
                            <input type="radio" name="param_type" value="display">
                            <div class="gp-radio-content">
                                <i class="ph ph-eye"></i> Display
                            </div>
                        </label>
                        <label class="gp-radio-card">
                            <input type="radio" name="param_type" value="update">
                            <div class="gp-radio-content">
                                <i class="ph ph-pencil-simple"></i> Update
                            </div>
                        </label>
                        <label class="gp-radio-card">
                            <input type="radio" name="param_type" value="both" checked>
                            <div class="gp-radio-content">
                                <i class="ph ph-arrows-left-right"></i> Both
                            </div>
                        </label>
                        <label class="gp-radio-card">
                            <input type="radio" name="param_type" value="config">
                            <div class="gp-radio-content">
                                <i class="ph ph-gear"></i> Config
                            </div>
                        </label>
                    </div>
                </div>

                <div class="gp-form-group" style="margin-bottom:20px;">
                    <label class="gp-check-row">
                        <input type="checkbox" id="is_required" name="is_required">
                        <span class="gp-check-box"><i class="ph ph-check" style="font-size:11px;"></i></span>
                        <span class="gp-check-label">Mark as required parameter</span>
                    </label>
                </div>

                <hr style="border:none;border-top:1px solid #f1f5f9;margin:0 0 18px;">

                <!-- Section: GenieACS Path -->
                <div class="gp-section-title">
                    <i class="ph ph-code" style="font-size:13px;"></i> GenieACS Path
                </div>

                <div class="gp-form-group">
                    <label class="gp-label">Parameter Path <span style="color:#dc2626;" id="path-required">*</span></label>
                    <input type="text" class="bk-input" id="param_path" name="param_path"
                        placeholder="e.g. VirtualParameters.pppoeUsername">
                    <div class="gp-help">Path to the parameter in GenieACS (optional for Config category)</div>
                    <div class="gp-path-hints">
                        <span class="gp-hint-chip" onclick="insertPath('VirtualParameters.')">
                            <i class="ph ph-tag" style="font-size:10px;"></i> Virtual
                        </span>
                        <span class="gp-hint-chip" onclick="insertPath('InternetGatewayDevice.')">
                            <i class="ph ph-tag" style="font-size:10px;"></i> TR-069
                        </span>
                        <span class="gp-hint-chip" onclick="insertPath('_deviceId.')">
                            <i class="ph ph-tag" style="font-size:10px;"></i> Device ID
                        </span>
                        <span class="gp-hint-chip" onclick="insertPath('_id')">
                            <i class="ph ph-tag" style="font-size:10px;"></i> ID
                        </span>
                    </div>
                </div>

            </form>
        </div>

        <!-- Footer -->
        <div class="gp-modal-footer">
            <button type="button" class="bk-btn bk-btn-ghost" onclick="closeParameterModal()">
                <i class="ph ph-x" style="font-size:13px;"></i> Cancel
            </button>
            <button type="button" class="bk-btn bk-btn-primary" onclick="document.getElementById('parameterForm').submit()">
                <i class="ph ph-floppy-disk" style="font-size:13px;"></i> Save
            </button>
        </div>

    </div>
</div>


<?php echo '<script'; ?>
>

    var editMode = false;

    // ===================== GP ALERT/CONFIRM ENGINE (replaces SweetAlert) =====================
    var _gpAlertCallback = null;
    function gpAlert(title, text, type, btnText) {
        type = type || 'info';
        btnText = btnText || 'OK';
        var icons = { success:'ph-check-circle', error:'ph-x-circle', warning:'ph-warning-circle', info:'ph-info' };
        var html = '<div class="gp-alert-icon ' + type + '"><i class="ph ' + (icons[type]||'ph-info') + '"></i></div>' +
            '<div class="gp-alert-title">' + title + '</div>' +
            '<div class="gp-alert-text">' + (text||'') + '</div>' +
            '<div class="gp-alert-actions"><button class="bk-btn bk-btn-primary" onclick="gpCloseAlert(true)">' + btnText + '</button></div>';
        document.getElementById('gpAlertCard').innerHTML = html;
        document.getElementById('gpAlertOverlay').classList.add('open');
        document.documentElement.classList.add('modal-open');
        return { then: function(cb) { _gpAlertCallback = cb; } };
    }
    function gpConfirm(title, text, type, confirmText, cancelText) {
        type = type || 'warning';
        confirmText = confirmText || 'Confirm';
        cancelText = cancelText || 'Cancel';
        var icons = { success:'ph-check-circle', error:'ph-x-circle', warning:'ph-warning-circle', info:'ph-info' };
        var confirmColor = type === 'warning' || type === 'error' ? 'bk-btn-danger' : 'bk-btn-primary';
        var html = '<div class="gp-alert-icon ' + type + '"><i class="ph ' + (icons[type]||'ph-info') + '"></i></div>' +
            '<div class="gp-alert-title">' + title + '</div>' +
            '<div class="gp-alert-text">' + (text||'') + '</div>' +
            '<div class="gp-alert-actions">' +
            '<button class="bk-btn bk-btn-ghost" onclick="gpCloseAlert(false)">' + cancelText + '</button>' +
            '<button class="bk-btn ' + confirmColor + '" onclick="gpCloseAlert(true)">' + confirmText + '</button>' +
            '</div>';
        document.getElementById('gpAlertCard').innerHTML = html;
        document.getElementById('gpAlertOverlay').classList.add('open');
        document.documentElement.classList.add('modal-open');
        return { then: function(cb) { _gpAlertCallback = cb; } };
    }
    function gpCloseAlert(confirmed) {
        document.getElementById('gpAlertOverlay').classList.remove('open');
        var anyOpen = document.querySelector('.gp-modal-overlay.open');
        if (!anyOpen) document.documentElement.classList.remove('modal-open');
        if (_gpAlertCallback) { var cb = _gpAlertCallback; _gpAlertCallback = null; cb(confirmed); }
    }
    document.getElementById('gpAlertOverlay').addEventListener('click', function(e) {
        if (e.target === this) gpCloseAlert(false);
    });

    // ---- Tab switching — sync desktop segment + mobile tabs ----
    function switchTab(btn, target) {
        // Deactivate all tabs (desktop + mobile) and panes
        document.querySelectorAll('.gp-tab, .gp-mobile-tab').forEach(function(t){ t.classList.remove('active'); });
        document.querySelectorAll('.tab-pane').forEach(function(p){ p.classList.remove('active'); });
        // Activate matching tabs in both bars
        document.querySelectorAll('[data-target="' + target + '"]').forEach(function(t){ t.classList.add('active'); });
        var pane = document.getElementById('tab-' + target);
        if (pane) pane.classList.add('active');
        // Save to localStorage
        localStorage.setItem('genieacs_params_active_tab', target);
    }

    // ---- Restore tab on load ----
    document.addEventListener('DOMContentLoaded', function() {
        var saved = localStorage.getItem('genieacs_params_active_tab');
        if (saved) {
            var btn = document.querySelector('.gp-tab[data-target="' + saved + '"]');
            if (btn) switchTab(btn, saved);
        }

        // Category radio → update path required indicator
        document.querySelectorAll('input[name="param_category"]').forEach(function(input) {
            input.addEventListener('change', updatePathRequired);
        });
    });

    // ---- Show Add Modal ----
    function showAddModal() {
        editMode = false;
        document.getElementById('modalTitle').innerHTML = '<i class="ph ph-plus-circle"></i> Add Parameter';
        document.getElementById('parameterForm').action = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_parameters/add';
        document.getElementById('parameterForm').reset();
        document.getElementById('param_id').value = 0;
        document.getElementById('param_key').readOnly = false;
        document.querySelector('input[name="param_category"][value="basic"]').checked = true;
        document.querySelector('input[name="param_type"][value="both"]').checked = true;
        openModal();
        setTimeout(updatePathRequired, 100);
    }

    // ---- Show Edit Modal ----
    function editParameter(id, key, label, path, type, category, required, order) {
        editMode = true;
        document.getElementById('modalTitle').innerHTML = '<i class="ph ph-pencil-simple"></i> Edit Parameter';
        document.getElementById('parameterForm').action = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_parameters/update';
        document.getElementById('param_id').value = id;
        document.getElementById('param_key').value = key;
        document.getElementById('param_key').readOnly = true;
        document.getElementById('param_label').value = label;
        document.getElementById('param_path').value = path;
        document.getElementById('display_order').value = order;
        var typeRadio = document.querySelector('input[name="param_type"][value="' + type + '"]');
        if (typeRadio) typeRadio.checked = true;
        var catRadio = document.querySelector('input[name="param_category"][value="' + category + '"]');
        if (catRadio) catRadio.checked = true;
        document.getElementById('is_required').checked = (required == 1);
        openModal();
        setTimeout(updatePathRequired, 100);
    }

    // ---- Open / Close modal ----
    function openModal() {
        var overlay = document.getElementById('parameterModalOverlay');
        overlay.classList.add('open');
        document.body.style.overflow = 'hidden';
        document.documentElement.classList.add('modal-open');
    }
    function closeParameterModal() {
        var overlay = document.getElementById('parameterModalOverlay');
        overlay.classList.remove('open');
        document.body.style.overflow = '';
        document.documentElement.classList.remove('modal-open');
    }

    // Close on overlay click
    document.getElementById('parameterModalOverlay').addEventListener('click', function(e) {
        if (e.target === this) closeParameterModal();
    });

    // Close on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeParameterModal();
    });

    // ---- Delete ----
    function deleteParameter(id, label) {
        gpConfirm(
            'Delete Parameter?',
            'Parameter <strong>' + label + '</strong> will be permanently deleted.',
            'warning',
            'Yes, delete!',
            'Cancel'
        ).then(function(confirmed) {
            if (confirmed) {
                window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_parameters/delete/' + id;
            }
        });
    }

    // ---- Insert path prefix ----
    function insertPath(prefix) {
        var input = document.getElementById('param_path');
        input.value = prefix;
        input.focus();
    }

    // ---- Toggle path required indicator ----
    function updatePathRequired() {
        var sel = document.querySelector('input[name="param_category"]:checked');
        var req = document.getElementById('path-required');
        var pathInput = document.getElementById('param_path');
        if (sel && sel.value === 'config') {
            if (req) req.style.display = 'none';
            if (pathInput) pathInput.removeAttribute('required');
        } else {
            if (req) req.style.display = 'inline';
            if (pathInput) pathInput.setAttribute('required', 'required');
        }
    }

    // Update on modal open via delegation
    document.addEventListener('click', function(e) {
        var t = e.target;
        if (t.matches('[onclick*="showAddModal"]') || t.matches('[onclick*="editParameter"]') ||
            t.closest('[onclick*="showAddModal"]') || t.closest('[onclick*="editParameter"]')) {
            setTimeout(updatePathRequired, 100);
        }
    });

<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
