new Instafeed({accessToken:"IGQVJXLXB6Q0dmZAWV2NGhnTG1xbmMtUTdzN1FQNGR3MVhlUnk2WHlGVWVmWXJ0dkQ5MGVaaFprelh0MDMtMzJGdF96R1BZASmtFZAmx3ZAXVITV9wdHBSSGJ5YVNyX1NoUnAzT05YUVo1TVR0dDFaRlFRMQZDZD",limit:6,after:function(){for(var e=document.getElementById("instafeed"),t=0;t<e.children.length;t++)for(var n=e.children,r=0;r<n.length;r++)n[r].children[0].setAttribute("class","shadow  bg-white rounded-lg "),n[r].setAttribute("target","_blank")},error:function(){document.getElementById("insta_error_msg").style.display="block"}}).run();