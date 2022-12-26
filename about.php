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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.096966609173!2d105.78049781424785!3d21.028805785998376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd0c66f05%3A0xea31563511af2e54!2zOCBUw7RuIFRo4bqldCBUaHV54bq_dCwgTeG7uSDEkMOsbmgsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1635332704619!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>        
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