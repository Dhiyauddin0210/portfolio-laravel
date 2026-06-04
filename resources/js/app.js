// Network Canvas Animation
const canvas = document.getElementById('network-canvas');
const ctx = canvas.getContext('2d');
let W, H, nodes;
const NODE_COUNT = 55, MAX_DIST = 160, ACC = '200, 241, 53';

function resize() { W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
function createNodes() {
  nodes = Array.from({length: NODE_COUNT}, () => ({
    x: Math.random()*W, y: Math.random()*H,
    vx: (Math.random()-.5)*.45, vy: (Math.random()-.5)*.45,
    r: Math.random()*1.8+1, pulse: Math.random()*Math.PI*2
  }));
}

let packets = [];
function spawnPacket() {
  if (packets.length > 8) return;
  const a = Math.floor(Math.random()*NODE_COUNT);
  let b; do { b = Math.floor(Math.random()*NODE_COUNT); } while(b===a);
  packets.push({from:a, to:b, t:0, speed:.008+Math.random()*.012});
}
setInterval(spawnPacket, 1200);

function draw() {
  ctx.clearRect(0,0,W,H);
  ctx.strokeStyle='rgba(255,255,255,0.025)'; ctx.lineWidth=1;
  for(let x=0;x<W;x+=80){ctx.beginPath();ctx.moveTo(x,0);ctx.lineTo(x,H);ctx.stroke();}
  for(let y=0;y<H;y+=80){ctx.beginPath();ctx.moveTo(0,y);ctx.lineTo(W,y);ctx.stroke();}
  nodes.forEach(n=>{n.x+=n.vx;n.y+=n.vy;n.pulse+=.025;if(n.x<0||n.x>W)n.vx*=-1;if(n.y<0||n.y>H)n.vy*=-1;});
  for(let i=0;i<NODE_COUNT;i++)for(let j=i+1;j<NODE_COUNT;j++){
    const dx=nodes[i].x-nodes[j].x,dy=nodes[i].y-nodes[j].y,d=Math.sqrt(dx*dx+dy*dy);
    if(d<MAX_DIST){ctx.beginPath();ctx.strokeStyle=`rgba(${ACC},${(1-d/MAX_DIST)*.25})`;ctx.lineWidth=.7;ctx.moveTo(nodes[i].x,nodes[i].y);ctx.lineTo(nodes[j].x,nodes[j].y);ctx.stroke();}
  }
  packets=packets.filter(p=>p.t<=1);
  packets.forEach(p=>{
    p.t+=p.speed;
    const nx=nodes[p.from].x+(nodes[p.to].x-nodes[p.from].x)*p.t;
    const ny=nodes[p.from].y+(nodes[p.to].y-nodes[p.from].y)*p.t;
    const g=ctx.createRadialGradient(nx,ny,0,nx,ny,8);
    g.addColorStop(0,`rgba(${ACC},.9)`);g.addColorStop(1,`rgba(${ACC},0)`);
    ctx.beginPath();ctx.arc(nx,ny,8,0,Math.PI*2);ctx.fillStyle=g;ctx.fill();
    ctx.beginPath();ctx.arc(nx,ny,2.5,0,Math.PI*2);ctx.fillStyle=`rgba(${ACC},1)`;ctx.fill();
  });
  nodes.forEach(n=>{
    const b=.4+Math.sin(n.pulse)*.15;
    ctx.beginPath();ctx.arc(n.x,n.y,n.r,0,Math.PI*2);ctx.fillStyle=`rgba(${ACC},${b})`;ctx.fill();
    if(n.r>2.2){const h=ctx.createRadialGradient(n.x,n.y,0,n.x,n.y,n.r*4);h.addColorStop(0,`rgba(${ACC},.12)`);h.addColorStop(1,`rgba(${ACC},0)`);ctx.beginPath();ctx.arc(n.x,n.y,n.r*4,0,Math.PI*2);ctx.fillStyle=h;ctx.fill();}
  });
  requestAnimationFrame(draw);
}

window.addEventListener('resize',()=>{resize();createNodes();});
resize(); createNodes(); draw();

// Modal
window.openModal = function(id) { document.getElementById('modal-' + id).classList.add('open'); document.body.style.overflow = 'hidden'; }
window.closeModal = function(id) { document.getElementById('modal-' + id).classList.remove('open'); document.body.style.overflow = ''; }
document.querySelectorAll('.modal-overlay').forEach(el => {
  el.addEventListener('click', function(e) { if (e.target === this) { this.classList.remove('open'); document.body.style.overflow = ''; } });
});

// Lightbox
window.closeLightbox = function() {
  document.getElementById('lightbox').classList.remove('open');
  const v = document.getElementById('lb-vid'); 
  v.pause(); 
  v.src = '';
  document.body.style.overflow = '';
}
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') { document.querySelectorAll('.modal-overlay.open').forEach(m => { m.classList.remove('open'); }); closeLightbox(); document.body.style.overflow = ''; }
});

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.gallery-item').forEach(item => {
    const type = item.dataset.type;
    if (type === 'img') {
      const img = item.querySelector('img');
      if (!img || !img.getAttribute('src')) item.style.display = 'none';
    } else if (type === 'vid') {
      const src = item.querySelector('source');
      if (!src || !src.getAttribute('src')) item.style.display = 'none';
    }
  });

  document.querySelectorAll('.gallery-item[data-type="img"]').forEach(item => {
    item.addEventListener('click', () => {
      const img = item.querySelector('img');
      if (img && img.src) {
        document.getElementById('lb-img').src = img.src;
        document.getElementById('lb-img').style.display = 'block';
        document.getElementById('lb-vid').style.display = 'none';
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  document.querySelectorAll('.gallery-item[data-type="vid"]').forEach(item => {
    item.addEventListener('click', () => {
      const src = item.querySelector('source');
      if (src && src.getAttribute('src')) {
        const vid = document.getElementById('lb-vid');
        vid.src = src.getAttribute('src');
        vid.style.display = 'block';
        document.getElementById('lb-img').style.display = 'none';
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
      }
    });
  });
});
const photos = [
  '/ftoadin.jpg',
  '/foto_full.jpeg'
];
let currentPhoto = 0;

window.togglePhoto = function() {
  currentPhoto = (currentPhoto + 1) % photos.length;
  document.getElementById('hero-img').src = photos[currentPhoto];
}