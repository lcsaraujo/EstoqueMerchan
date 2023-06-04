
<div class="main">
  <div class="main-inner">
    <div class="container">
     <div class="row">
     
     		
            <div class="span12">
            
            <?php
				if(isset($_GET['acao'])){
					$acao = $_GET['acao'];
					if($acao=='welcome'){
						echo 
               '<div class="alert alert-info">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Olá, '.$nomeLogado.'!</strong> Seja Bem vindo ao <strong>Dashboard</strong> !
               </div>';
					}
				}
			 ?>  
      		</div>
            
            
            <div class="span12">	      		
	      		<div id="target-1" class="widget">	      			
	      			<div class="widget-content">	      				
			      		<h1><strong>Seja Bem vindo <?php echo $nomeLogado ?></strong> </h1>			      		
			      		<p> 
		      		</div> <!-- /widget-content -->
	      		</div> <!-- /widget -->
      		</div><!-- span 12 -->
            
            
    </div><!-- row -->  
            
     


                  
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
  <!-- Footer -->
 