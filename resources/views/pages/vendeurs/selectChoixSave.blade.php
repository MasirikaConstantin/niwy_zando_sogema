<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Card Modal vente</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/cardChoix/card_slide.css')}}" />
	<style>
		.thm-btn {
		    display: inline-block;
		    vertical-align: middle;
		    border: none;
		    outline: none;
		    background-color: #21b7cd;
		    font-size: 18px;
		    color: #ffffff !important;
		    font-weight: 700;
		    /* padding: 20.5px 59px; */
		    border-radius: 0;
		    -webkit-transition: all 0.4s ease;
		    transition: all 0.4s ease;
		}
		.thm-btn:hover{
			background-color: #fd6e56;
		}
		/*a {
		    color: #007bff;
		    text-decoration: none;
		    background-color: transparent;
		}*/
	</style>
</head>

<body>
	{{-- <button class="" data-toggle="modal" data-target="#rayon">modal</button> --}}

	<div id="rayon" data-backdrop="static" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal">
			<div class="modal-content" style="background:linear-gradient(to right, #fd6e56 0%, #21b7cd 100%);">

				<div class="modal-body">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->

					<div class="row justify-content-center">
						<div class="col-lg-6 text-center">
							<div class="cardM">								
								<div class="face back-face">
                                    {{-- <span class="fa fa-quote-left text-dark"></span> --}}
									
									<div class="testimonial"> 
										<a href="{{route('vend.create', ['enregistrement'=>'pre-enregistrement'])}}" class="btn btn-lg add-btn thm-btn" style="border-radius:35px;">Pré-enregistrement
										</a> 
									</div> 
									{{-- <span class="fa fa-quote-right text-dark"></span>								
									<span class="fa fa-quote-right text-dark"></span> --}}
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="cardM text-center">								
								<div class="face back-face">
                                    {{-- <span class="fa fa-quote-left text-dark"></span> --}}
									
									<div class="testimonial"> 
										<a href="{{route('vend.create')}}" class="btn btn-lg add-btn thm-btn" style="border-radius:35px;">Enregistrement
										</a> 
									</div> 
									{{-- <span class="fa fa-quote-right text-dark"></span>								
									<span class="fa fa-quote-right text-dark"></span> --}}
								</div>
							</div>
						</div>

						{{-- <div class="col-lg-4">
							<div class="card">
								<div class="face front-face"> 
									<img src="{{asset('app-assets/cardChoix/terrasse.png')}}" alt="" class="profile">
									<div class="pt-3 text-uppercase name text-white text-center">Terrasse</div>						
								</div>
								<div class="face back-face"> 
									<span class="fa fa-quote-left text-dark"></span>
									
									<div class="testimonial"> <a href="{{ route('caissier.create',['rayon' =>"terrasse"]) }}" class="btn btn-lg add-btn thm-btn" style="border-radius:35px;">Terrasse</a>
									</div>
									<span class="fa fa-quote-right text-dark"></span>
									<span class="fa fa-quote-right text-dark"></span>
								</div>
							</div>
						</div> --}}
					</div>

					<div class="row justify-content-center mt-3">
						<didv class="col-sm-2">
							<a href="{{back()->getTargetUrl()}}" class="btn btn-lgM add-btn thm-btn" style="padding: 5px 30px !important; border-radius: 20px;">
								Retour
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> 
	
<script>
	
	$(document).ready(function() {    
    	$('#rayon').modal('show')
    }); 
</script>
</body>
</html>