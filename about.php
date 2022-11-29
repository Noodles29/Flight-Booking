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