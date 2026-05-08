<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>
    {{ filled($title ?? null) ? $title.' - '.config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

@fonts

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
@if(app()->getLocale() === 'bilingual')
<style>
.t-en{display:block;font-size:9px;opacity:.35;font-style:italic;line-height:1.4;font-weight:400}
ui-label{flex-direction:column!important;align-items:flex-start!important}
</style>
<script>
document.addEventListener('DOMContentLoaded',()=>{
    const nodes=[];
    const walk=document.createTreeWalker(document.body,NodeFilter.SHOW_TEXT);
    while(walk.nextNode()){
        const n=walk.currentNode;
        if(n.textContent.includes('\n')&&!['SCRIPT','STYLE','TEXTAREA'].includes(n.parentElement?.tagName))
            nodes.push(n);
    }
    nodes.forEach(n=>{
        const parts=n.textContent.split('\n').map(s=>s.trim()).filter(Boolean);
        if(parts.length<2)return;
        const s=document.createElement('span');
        s.style.cssText='display:contents';
        s.innerHTML=parts[0]+'<span class="t-en">'+parts.slice(1).join(' ')+'</span>';
        n.replaceWith(s);
    });
});
</script>
@endif
