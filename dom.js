



setInterval(()=>
{var pos_x = Math.round(Math.random() * 1200);
var pos_y = Math.round(Math.random() * 500);
console.log(pos_x);
document.getElementById('game').style.marginLeft = pos_x+"px";
document.getElementById('game').style.marginTop = pos_y+"px";
document.getElementById('game').style.background = pos_x;

},1000)