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
.t-en{display:inline-block;font-size:10px;font-weight:500;font-style:normal;
  color:#818cf8;background:rgba(129,140,248,.12);
  padding:1px 6px;border-radius:10px;margin-left:5px;
  vertical-align:middle;white-space:nowrap;line-height:1.8}
ui-label{flex-direction:column!important;align-items:flex-start!important}
ui-label .t-en{margin-left:0;margin-top:2px}
</style>
<script>
function applyBilingual(){
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
}
document.addEventListener('DOMContentLoaded',applyBilingual);
document.addEventListener('livewire:navigated',applyBilingual);
</script>
@endif
