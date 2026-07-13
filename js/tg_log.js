async function tgGetIP() {
  try {
    const r = await fetch('https://api.ipify.org?format=json');
    const d = await r.json();
    return d.ip || '—';
  } catch { return '—'; }
}

async function tgLog(lines, action = null) {
  const text = Array.isArray(lines) ? lines.join('\n') : lines;
  try {
    const body = { text };
    if (action) body.action = action;
    await fetch('log.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body),
    });
  } catch { }
}
