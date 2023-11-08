var aba1 = document.getElementById('aba1');    
var aba2 = document.getElementById('aba2');


       
        function inicia(){ 
            /* FUNÇÃO QUE INICIA O BODY ESCONDENDO AS TABS */
             
            // aba2.style.display = "none";
            for(var i=1;i<3;i++){
                document.getElementById("aba"+i).hidden = true;
                
            }
            
            document.getElementById("aba1").addEventListener("click",mostrar);
            document.getElementById("aba2").addEventListener("click",mostrar);
        }
        function mostrar(){
            for(var i=1;i<3;i++){
                document.getElementById("aba"+i).hidden = true;
                
            
            }
            var obj= event.target.dataset.nome;
            document.getElementById(obj).hidden=false;
               
        }