$(document).ready(function(){$("#openSidebar").click(function(){toggleSidebar()}),$(".closebtn").click(function(){toggleSidebar()})});$(document).ready(function(){var n=$(".slide"),e=0;t(),setInterval(t,5e3);function t(){n.eq(e).removeClass("showing"),e=(e+1)%n.length,n.eq(e).addClass("showing")}function i(){n.eq(e).removeClass("showing"),e=(e-1+n.length)%n.length,n.eq(e).addClass("showing")}$("#prevBtn").click(function(){i()}),$("#nextBtn").click(function(){t()}),$("#dropbtn-nav").click(function(){$(".dropdown-content").toggle()})});$(document).ready(function(){$("#dropbtn-nav").click(function(){var n=$(this).next();n.toggle(),$(this).toggleClass("active",n.is(":visible"))})});
