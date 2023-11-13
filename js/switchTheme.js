document.documentElement.className = 'lightTheme';
            var theme = "lightTheme";
            function switchTheme(){
                if(theme === 'darkTheme'){
                    document.documentElement.className = 'lightTheme';
                    theme = 'lightTheme';
                } else {
                    document.documentElement.className = 'darkTheme';
                    theme = 'darkTheme';
                }

            }
        // window.addEventListener("load",inicia);