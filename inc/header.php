<html>

    <head>
    
        <meta charset = "utf-8"/>
        <title>Blog - <?php echo $titre_page; ?></title>
        <link href = "style.css" rel = "stylesheet" />
        
    </head>
    
    <body>
    
        <header <?php if ($titre_page == "Accueil") {echo "class = 'home' ";} ?>>
        
            <nav id = "menu">
            
                <a href = "index.php">Accueil</a>
                
                <a href = "archives.html">Archives</a>
                
                <a href = "apropos.html">&Agrave; Propos </a>
                
            </nav>
            
        </header>
    
        
        <main>