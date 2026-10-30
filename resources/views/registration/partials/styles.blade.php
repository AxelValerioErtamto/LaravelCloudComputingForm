<style>
    *, *::before, *::after { box-sizing: border-box; }
    body {
        margin: 0;
        min-height: 100vh;
        padding: 48px 16px;
        background: #f8fafc;
        font-family: "Segoe UI", system-ui, -apple-system, Roboto, "Helvetica Neue", Arial, sans-serif;
        color: #1f2937;
    }
    .card {
        max-width: 448px;
        margin: 0 auto;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, .12), 0 4px 10px -6px rgba(15, 23, 42, .1);
    }
    .card-header {
        position: relative;
        padding: 28px 24px 24px;
        text-align: center;
        color: #fff;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        overflow: hidden;
    }
    .card-header .cloud {
        position: absolute;
        right: -14px;
        top: -6px;
        width: 120px;
        color: rgba(255, 255, 255, .12);
    }
    .card-header h1 { margin: 0; font-size: 24px; font-weight: 700; letter-spacing: -.01em; }
    .card-header p  { margin: 4px 0 0; font-size: 15px; color: #dbeafe; }
    .card-body { padding: 24px; }

    .field { margin-bottom: 18px; }
    label { display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #374151; }
    input {
        width: 100%;
        padding: 10px 12px;
        font: inherit;
        font-size: 15px;
        color: #111827;
        background: #fff;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        transition: border-color .15s, box-shadow .15s;
    }
    input::placeholder { color: #9ca3af; }
    input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37, 99, 235, .18); }
    input.is-invalid { border-color: #dc2626; }
    input.is-invalid:focus { box-shadow: 0 0 0 3px rgba(220, 38, 38, .15); }
    .error { margin: 6px 0 0; font-size: 13px; color: #dc2626; }
    .hint  { margin: 6px 0 0; font-size: 13px; color: #6b7280; }

    .btn {
        display: block;
        width: 100%;
        margin-top: 24px;
        padding: 11px 16px;
        font: inherit;
        font-size: 15px;
        color: #fff;
        background: #2563eb;
        border: 0;
        border-radius: 6px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: background .15s;
    }
    .btn:hover { background: #1d4ed8; }
    .btn:disabled { background: #93c5fd; cursor: wait; }

    .alert { margin-bottom: 18px; padding: 12px 14px; border-radius: 6px; font-size: 14px; line-height: 1.45; }
    .alert-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

    .below { margin: 20px 0 0; text-align: center; font-size: 14px; }
    .below a { color: #64748b; text-decoration: none; }
    .below a:hover { color: #2563eb; }

    /* Status pages */
    .status { padding: 36px 28px 30px; text-align: center; }
    .status-icon {
        width: 56px; height: 56px; margin: 0 auto 16px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; font-size: 26px; font-weight: 700;
    }
    .tone-success .status-icon { background: #dcfce7; color: #16a34a; }
    .tone-info    .status-icon { background: #dbeafe; color: #2563eb; }
    .tone-warning .status-icon { background: #fef3c7; color: #d97706; }
    .tone-error   .status-icon { background: #fee2e2; color: #dc2626; }
    .status h2 { margin: 0 0 10px; font-size: 22px; color: #111827; }
    .status p  { margin: 0; font-size: 15px; line-height: 1.55; color: #4b5563; }
    .status .email { display: inline-block; margin-top: 6px; font-weight: 600; color: #1d4ed8; word-break: break-all; }
    .status .note { margin-top: 18px; padding: 12px 14px; background: #f8fafc; border-radius: 6px; font-size: 13.5px; color: #64748b; }
    .status .btn { margin-top: 22px; }
</style>
