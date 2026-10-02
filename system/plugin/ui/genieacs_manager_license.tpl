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
* { box-sizing: border-box; }

/* ===================== LICENSE PAGE — DESIGN SYSTEM ===================== */
.lic-wrap { font-family: 'DM Sans', system-ui, sans-serif; }
.lic-center { max-width: 520px; margin: 0 auto; padding: 120px 24px 48px; }
.lic-center-wide { max-width: 700px; margin: 0 auto; padding: 120px 24px 48px; }

/* ---- Shared card base ---- */
.lic-card { background: white; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.06); width: 100%; }
.lic-card-header { padding: 24px 28px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f1f5f9; background: #fafcff; }
.lic-card-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.lic-card-title { font-size: 15px; font-weight: 700; color: #0f172a; }
.lic-card-subtitle { font-size: 12px; color: #94a3b8; margin-top: 2px; }
.lic-card-body { padding: 24px 28px; }
.lic-card-footer { padding: 12px 28px; border-top: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 6px; background: #fafcff; }
.lic-footer-brand { font-size: 11px; color: #94a3b8; display: flex; align-items: center; gap: 5px; }
.lic-footer-link { font-size: 11px; color: #64748b; display: flex; align-items: center; gap: 4px; text-decoration: none; }
.lic-footer-link:hover { color: #0271c6; }

/* ---- Hero banner (gradient) ---- */
.lic-banner { padding: 28px 28px 24px; text-align: center; color: white; position: relative; overflow: hidden; }
.lic-banner::before { content:''; position:absolute; top:-40px; right:-40px; width:160px; height:160px; background:rgba(255,255,255,0.06); border-radius:50%; }
.lic-banner::after  { content:''; position:absolute; bottom:-50px; right:50px; width:200px; height:200px; background:rgba(255,255,255,0.04); border-radius:50%; }
.lic-banner-inner { position: relative; z-index: 1; }
.lic-banner-icon { width: 56px; height: 56px; background: rgba(255,255,255,0.15); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 14px; }
.lic-banner h1 { font-size: 20px; font-weight: 800; margin: 0 0 6px; letter-spacing: -0.3px; }
.lic-banner p  { font-size: 13px; opacity: 0.85; line-height: 1.6; margin: 0; }

/* ---- Activate state ---- */
.lic-activate-banner { background: linear-gradient(135deg, #1e40af, #2563eb); }

/* ---- Blocked state ---- */
.lic-blocked-banner { background: linear-gradient(135deg, #7f1d1d, #991b1b, #b91c1c); text-align: left; }
.lic-blocked-banner-row { display: flex; align-items: flex-start; gap: 16px; position: relative; z-index: 1; }
.lic-blocked-banner-text h1 { font-size: 20px; font-weight: 800; margin: 0 0 5px; }
.lic-blocked-banner-text p  { font-size: 13px; opacity: 0.85; line-height: 1.6; margin: 0; }

/* ---- Form elements ---- */
.lic-label { font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 6px; display: flex; align-items: center; gap: 5px; }
.lic-input-row { display: flex; gap: 8px; margin-bottom: 8px; }
.lic-input { flex: 1; height: 40px; padding: 0 14px; border: 1.5px solid #e2e8f0; border-radius: 9px; font-size: 13px; font-family: 'DM Mono', monospace; letter-spacing: 2px; color: #0f172a; background: #f8fafc; outline: none; transition: border-color 0.2s, box-shadow 0.2s; min-width: 0; }
.lic-input:focus { border-color: #0271c6; background: #fff; box-shadow: 0 0 0 3px rgba(2,113,198,0.1); }
.lic-input::placeholder { color: #cbd5e1; letter-spacing: 1px; font-family: 'DM Mono', monospace; }
.lic-btn { height: 40px; padding: 0 18px; background: #0271c6; color: white; border: none; border-radius: 9px; font-size: 13px; font-weight: 700; font-family: 'DM Sans', sans-serif; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; white-space: nowrap; flex-shrink: 0; transition: background 0.15s; box-shadow: 0 2px 8px rgba(2,113,198,0.25); }
.lic-btn:hover:not(:disabled) { background: #0359a0; }
.lic-btn:disabled { opacity: 0.6; cursor: not-allowed; }
.lic-btn-full { width: 100%; justify-content: center; }
.lic-feedback { min-height: 20px; font-size: 12px; display: flex; align-items: center; gap: 5px; margin-bottom: 14px; font-family: 'DM Sans', sans-serif; }

/* ---- Info/hint box ---- */
.lic-hint { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px 14px; font-size: 12px; color: #64748b; display: flex; align-items: flex-start; gap: 8px; line-height: 1.6; }
.lic-hint-icon { color: #0271c6; margin-top: 1px; flex-shrink: 0; }

/* ---- Section divider inside card ---- */
.lic-section { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; }
.lic-section:last-child { border-bottom: none; }
.lic-section-title { font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.07em; display: flex; align-items: center; gap: 6px; margin-bottom: 12px; }

/* ---- Error message box ---- */
.lic-error-box { background: #fef2f2; border: 1px solid #fecaca; border-radius: 10px; padding: 12px 14px; font-size: 13px; color: #334155; line-height: 1.8; word-break: break-word; }

/* ---- Access point info rows ---- */
.lic-access-row { display: flex; align-items: center; gap: 10px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 9px; padding: 10px 14px; margin-bottom: 8px; }
.lic-access-row:last-child { margin-bottom: 0; }
.lic-access-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.lic-access-label { font-size: 12px; font-weight: 700; color: #0f172a; }
.lic-access-sub   { font-size: 11px; color: #64748b; margin-top: 1px; }

/* ---- Telegram CTA button ---- */
.lic-tg-btn { display: flex; align-items: center; gap: 12px; background: #229ED9; color: white; border-radius: 10px; padding: 12px 16px; text-decoration: none; font-weight: 600; font-size: 14px; transition: background 0.2s; }
.lic-tg-btn:hover { background: #1a8bbf; color: white; text-decoration: none; }
.lic-tg-name { font-size: 14px; font-weight: 700; }
.lic-tg-sub  { font-size: 11px; opacity: 0.85; font-weight: 400; margin-top: 1px; }
.lic-tg-arrow { margin-left: auto; flex-shrink: 0; opacity: 0.8; }

/* ---- Responsive ---- */
@media (max-width: 600px) {
    .lic-center, .lic-center-wide { padding: 60px 14px 32px; }
    .lic-card { border-radius: 20px; box-shadow: 0 8px 32px rgba(0,0,0,0.10); }
    .lic-card-body { padding: 18px 16px; }
    .lic-banner { padding: 24px 18px 20px; border-radius: 20px 20px 0 0; }
    .lic-banner-icon { width: 48px; height: 48px; border-radius: 14px; }
    .lic-banner h1 { font-size: 18px; }
    .lic-banner p { font-size: 12px; }
    .lic-section { padding: 14px 16px; }
    .lic-card-footer { padding: 12px 16px; border-radius: 0 0 20px 20px; }
    .lic-input-row { flex-direction: column; gap: 10px; }
    .lic-input { height: 44px; font-size: 14px; border-radius: 10px; }
    .lic-btn { width: 100%; justify-content: center; height: 44px; font-size: 14px; border-radius: 10px; }
    .lic-blocked-banner-row { flex-direction: column; gap: 12px; }
    .lic-tg-btn { padding: 14px 16px; border-radius: 12px; }
    .lic-access-row { padding: 12px 14px; border-radius: 10px; }
    .lic-hint { border-radius: 12px; padding: 14px; font-size: 12px; }
    .lic-error-box { border-radius: 10px; }
}
@keyframes licSpin { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
{/literal}
</style>

{if $license_page_type == 'blocked'}
<div class="lic-center-wide">
    <div class="lic-card">

        {if $license_page_subtype == 'whitelist'}
        <!-- === WHITELIST BLOCKED === -->
        <div class="lic-banner lic-blocked-banner">
            <div class="lic-blocked-banner-row">
                <div class="lic-banner-icon" style="flex-shrink:0;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="white" stroke-width="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="white" stroke-width="2" stroke-linecap="round"/></svg>
                </div>
                <div class="lic-blocked-banner-text">
                    <h1>Access Restricted</h1>
                    <p>This access point is not authorized for this license. Your license is locked to a specific server.</p>
                </div>
            </div>
        </div>

        <!-- How License Works -->
        <div class="lic-section">
            <div class="lic-section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#64748b" stroke-width="2"/><line x1="12" y1="8" x2="12" y2="12" stroke="#64748b" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="16" r="1" fill="#64748b"/></svg>
                How License Works
            </div>
            <p style="font-size:13px;color:#334155;line-height:1.8;margin:0 0 12px;">Each GenieACS Manager license is registered to <strong>one server only</strong>. Every server has up to <strong>2 authorized access points</strong>:</p>
            <div class="lic-access-row">
                <div class="lic-access-icon" style="background:#eff6ff;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" stroke="#0271c6" stroke-width="2"/><polyline points="9 22 9 12 15 12 15 22" stroke="#0271c6" stroke-width="2"/></svg>
                </div>
                <div>
                    <div class="lic-access-label">Local Access</div>
                    <div class="lic-access-sub">Private IP (e.g. 192.168.x.x or 10.x.x.x)</div>
                </div>
            </div>
            <div class="lic-access-row">
                <div class="lic-access-icon" style="background:#f0fdf4;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#16a34a" stroke-width="2"/><line x1="2" y1="12" x2="22" y2="12" stroke="#16a34a" stroke-width="1.5"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" stroke="#16a34a" stroke-width="1.5"/></svg>
                </div>
                <div>
                    <div class="lic-access-label">Public Access</div>
                    <div class="lic-access-sub">Domain or public IP (e.g. billing.yourisp.com)</div>
                </div>
            </div>
            <p style="margin-top:12px;color:#64748b;font-size:12px;">Your current access point is not whitelisted. Contact ExodiaForb Plugin to add your local IP or domain to the whitelist.</p>
        </div>

        <!-- Contact Telegram -->
        <div class="lic-section">
            <div class="lic-section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="#64748b" stroke-width="2"/></svg>
                Need Access? Contact Us
            </div>
            <a href="https://t.me/Exoforb" target="_blank" class="lic-tg-btn">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="white" style="flex-shrink:0;"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.833.941z"/></svg>
                <div>
                    <div class="lic-tg-name">Contact via Telegram</div>
                    <div class="lic-tg-sub">t.me/Exoforb — ExodiaForb Plugin Support</div>
                </div>
                <svg class="lic-tg-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" stroke="white" stroke-width="2" stroke-linecap="round"/><polyline points="15 3 21 3 21 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><line x1="10" y1="14" x2="21" y2="3" stroke="white" stroke-width="2" stroke-linecap="round"/></svg>
            </a>
        </div>

        {else}
        <!-- === GENERAL BLOCKED === -->
        <div class="lic-banner lic-blocked-banner">
            <div class="lic-blocked-banner-row">
                <div class="lic-banner-icon" style="flex-shrink:0;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="white" stroke-width="2"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07" stroke="white" stroke-width="2" stroke-linecap="round"/></svg>
                </div>
                <div class="lic-blocked-banner-text">
                    <h1>Plugin Access Blocked</h1>
                    <p>GenieACS Manager has been blocked due to an invalid or revoked license. Provide a valid license key to restore access.</p>
                </div>
            </div>
        </div>

        <!-- Error Details -->
        <div class="lic-section">
            <div class="lic-section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#dc2626" stroke-width="2"/><line x1="12" y1="8" x2="12" y2="12" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="16" r="1" fill="#dc2626"/></svg>
                <span style="color:#dc2626;">License Error Details</span>
            </div>
            <div class="lic-error-box">{$license_page_message|escape:'html'}</div>
        </div>

        <!-- Update Key -->
        <div class="lic-section">
            <div class="lic-section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Enter Valid License Key
            </div>
            <div class="lic-input-row">
                <input type="text" id="activateLicenseKey" class="lic-input" placeholder="EXO-XXXX-XXXX-XXXX" autocomplete="off" spellcheck="false">
                <button onclick="activateLicense()" class="lic-btn" id="activateBtn">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><polyline points="23 4 23 11 16 11" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 11" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Update Key
                </button>
            </div>
            <div id="activateMsg" class="lic-feedback"></div>
        </div>
        {/if}

        <!-- Footer -->
        <div class="lic-card-footer">
            <div class="lic-footer-brand">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="#94a3b8" stroke-width="2"/></svg>
                GenieACS Manager &mdash; <strong>ExodiaForb Plugin</strong>
            </div>
            <a href="https://t.me/Exoforb" target="_blank" class="lic-footer-link">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="#64748b" stroke-width="1.8"/></svg>
                t.me/Exoforb
            </a>
        </div>

    </div>
</div>

{else}
<div class="lic-center">
    <div class="lic-card">

        <div class="lic-banner lic-activate-banner">
            <div class="lic-banner-inner">
                <div class="lic-banner-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <h1>Activate GenieACS Manager</h1>
                <p>Enter the license key you received from ExodiaForb Plugin to activate and start using GenieACS Manager.</p>
            </div>
        </div>

        <div class="lic-card-body">
            <label class="lic-label" for="activateLicenseKey">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="#64748b" stroke-width="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="#64748b" stroke-width="2" stroke-linecap="round"/></svg>
                License Key
            </label>
            <div class="lic-input-row">
                <input type="text" id="activateLicenseKey" class="lic-input" placeholder="EXO-XXXX-XXXX-XXXX" autocomplete="off" spellcheck="false">
                <button onclick="activateLicense()" class="lic-btn" id="activateBtn">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Activate
                </button>
            </div>
            <div id="activateMsg" class="lic-feedback"></div>
            <div class="lic-hint">
                <svg class="lic-hint-icon" width="14" height="14" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#0271c6" stroke-width="2"/><line x1="12" y1="8" x2="12" y2="12" stroke="#0271c6" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="16" r="1" fill="#0271c6"/></svg>
                <span>Your license key should look like <strong>EXO-XXXX-XXXX-XXXX</strong>. Contact ExodiaForb Plugin if you have not received your license key.</span>
            </div>
        </div>

        <div class="lic-card-footer">
            <div class="lic-footer-brand">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="#94a3b8" stroke-width="2"/></svg>
                GenieACS Manager &mdash; <strong>ExodiaForb Plugin</strong>
            </div>
            <a href="https://t.me/Exoforb" target="_blank" class="lic-footer-link">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="#64748b" stroke-width="1.8"/></svg>
                t.me/Exoforb
            </a>
        </div>

    </div>
</div>
{/if}

</div>

<script>
function activateLicense() {
    var key = document.getElementById('activateLicenseKey').value.trim();
    var msg = document.getElementById('activateMsg');
    var btn = document.getElementById('activateBtn');

    if (!key) {
        msg.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#dc2626" stroke-width="2"/><line x1="15" y1="9" x2="9" y2="15" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/><line x1="9" y1="9" x2="15" y2="15" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/></svg> <span style="color:#dc2626;">License key is required</span>';
        return;
    }

    key = key.replace(/\s/g, '').toUpperCase().replace(/[^A-Z0-9\-]/g, '');
    var parts = key.split('-');
    var validFormat = parts.length >= 5 &&
        parts[0] === 'EXO' &&
        parts[1].length === 4 && /^[A-Z0-9]+$/.test(parts[1]) &&
        parts[2].length === 4 && /^[A-Z0-9]+$/.test(parts[2]) &&
        parts[3].length === 4 && /^[A-Z0-9]+$/.test(parts[3]) &&
        parts[4].length > 0   && /^[A-Z0-9]+$/.test(parts[4]);

    if (!validFormat) {
        msg.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#dc2626" stroke-width="2"/><line x1="15" y1="9" x2="9" y2="15" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/><line x1="9" y1="9" x2="15" y2="15" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/></svg> <span style="color:#dc2626;">Invalid license key format. Use EXO-XXXX-XXXX-XXXX</span>';
        return;
    }

    document.getElementById('activateLicenseKey').value = key;
    btn.disabled = true;
    btn.innerHTML = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" style="animation:licSpin 0.7s linear infinite;"><path d="M21 12a9 9 0 1 1-2.1-5.7" stroke="white" stroke-width="2.5" stroke-linecap="round"/><polyline points="21 3 21 9 15 9" stroke="white" stroke-width="2.5" stroke-linecap="round"/></svg> Processing...';
    msg.innerHTML = '';

    var xhr = new XMLHttpRequest();
    xhr.open('POST', window.location.href, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.timeout = 12000;

    function resetBtn() {
        btn.disabled = false;
        {if $license_page_type == 'blocked'}
        btn.innerHTML = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none"><polyline points="23 4 23 11 16 11" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 11" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> Update Key';
        {else}
        btn.innerHTML = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Activate';
        {/if}
    }

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            resetBtn();
            try {
                var d = JSON.parse(xhr.responseText);
                if (d.success) {
                    window.location.reload();
                } else {
                    msg.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#dc2626" stroke-width="2"/><line x1="15" y1="9" x2="9" y2="15" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/><line x1="9" y1="9" x2="15" y2="15" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/></svg> <span style="color:#dc2626;">' + (d.error || 'Failed to save license key') + '</span>';
                }
            } catch(e) {
                msg.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" stroke="#92400e" stroke-width="2"/></svg> <span style="color:#92400e;">Invalid server response. Please try again.</span>';
            }
        }
    };

    xhr.ontimeout = function() {
        resetBtn();
        msg.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#92400e" stroke-width="2"/><line x1="12" y1="8" x2="12" y2="12" stroke="#92400e" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="16" r="1" fill="#92400e"/></svg> <span style="color:#92400e;">Request timeout. Please try again.</span>';
    };

    xhr.send('action=save_license_key&license_key=' + encodeURIComponent(key.toUpperCase()));
}

document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('activateLicenseKey');
    if (input) {
        input.focus();
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') activateLicense();
        });
    }
});
</script>

{include file="sections/footer.tpl"}
