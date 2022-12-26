 <!-- Masthead-->
        <header style="margin-top: 100px;">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                    	 <h1 class="text-uppercase font-weight-bold" style="padding: 25px 0;">About Us</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>

            <img src="assets/img/logo-doc.png" alt="" class="logo_doc">
            
        </header>
    <section class="page-section">
        <div class="container">
    <?php echo html_entity_decode($_SESSION['setting_about_content']) ?>        
            
        </div>
        <div class="container">
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1052" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=%C4%91%E1%BA%A1i%20h%E1%BB%8Dc%20c%C3%B4ng%20ngh%E1%BB%87%20th%C3%B4ng%20tin&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:1052px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1052px;}</style></div></div>
        </section>

        <style>
            .logo_doc {
                display: block; 
                height: 300px;
                margin-left: auto; 
                margin-right: auto; 
                margin-top: 128px;
                padding: 30px;
            }
        </style>