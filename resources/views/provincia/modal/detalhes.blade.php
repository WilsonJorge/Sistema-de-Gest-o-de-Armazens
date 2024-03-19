
<div class="modal fade" id="details-provincia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCenterTitle-2">Detalhes da provincia</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">


  
                <div class="main-content pt-4">
                    
                    <div class="row">
    
                   
    
                        {{-- <input type="hidden" id="id_credito" value="<?= $_GET['id']; ?>" /> --}}
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                   
    
                                    <div class="ul-widget__item">
                                        <div class="ul-widget__info">
                                            <span class="ul-widget__desc text-mute">Nome</span>
                                            <h3 class="ul-widget1__title" style="font-size: 15px"> Provincia</h3>
                                            {{-- <h3 class="ul-widget1__title" style="font-size: 15px"><?= $response->descricao ?? "" ?></h3> --}}
                                        </div>
                                        <div class="ul-widget__info">
                                            <span class="ul-widget__desc text-mute">Data de Registo</span>
                                            <h3 class="ul-widget1__title" style="font-size: 15px"> 20-02-2024</h3>
                                            {{-- <h3 class="ul-widget1__title" style="font-size: 15px"><?= $response->created_at ?></h3> --}}
                                        </div>
                                        
                                        <div class="ul-widget__info">
                                            <span class="ul-widget__desc text-mute">Estado</span>
                                          
                                            <h3 class="ul-widget1__title" style="font-size: 15px"><span class="badge badge-success mr-1 mb-1"> Activo</span></h3>
                                            {{-- <?php 
                                             if($response->estado->descricao == "Activo"){?>
                                                <h3 class="ul-widget1__title" style="font-size: 15px"><span class="badge badge-success mr-1 mb-1"><?= $response->estado->descricao ?></span></h3>
                                            <?php
                                            }else if($response->estado->descricao == "Inactivo"){ ?>
                                                <h3 class="ul-widget1__title" style="font-size: 15px"><span class="badge badge-danger mr-1 mb-1"><?= $response->estado->descricao ?></span></h3>
                                           <?php
                                            }?>
                                             --}}
                                        </div>
    
                                        <div class="ul-widget__info">
                                            <span class="ul-widget__desc text-mute"></span>
                                            <h3 class="ul-widget1__title" style="font-size: 15px"></h3>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="main-content">
                                <div class="card user-profile o-hidden mb-4">
    
                                    <div class="card-body">
                                        <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
    
                                           <li class="nav-item">
                                                <a class="nav-link active" id="historico-tab" data-toggle="tab" href="#historico"role="tab" aria-controls="about" aria-selected="true">
                                                    <i class="fa fa-clock mr-1"></i>
                                                    Histórico
                                                </a>
                                            </li>
                                                                            
                                        </ul>
                                        <div class="tab-content" id="profileTabContent">
                                            
                                            <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                                                <div class="row anexos-pagamentos---Por fazer">
    
    
                                                </div>
                                            </div>
                                            <div class="tab-pane fade active show" id="historico" role="tabpanel" aria-labelledby="about-tab">
                                                <div class="mb-1"><strong class="mr-1"> <i class="fa fa-user-circle mr-1"></i> Adelson Saguate registrou a provinvia</strong>
                                                    <p class="text-muted"> <i class="fa fa-calendar mr-1"></i> 20-02-2024 15:14 pm</p>
                                                </div>
                                                <div class="mb-1"><strong class="mr-1"> <i class="fa fa-user-circle mr-1"></i> Lucas Tive actualizou a provinvia</strong>
                                                    <p class="text-muted"> <i class="fa fa-calendar mr-1"></i> 24-02-2024 11:14 pm</p>
                                                </div>
                                                {{-- <?php foreach ($historico->data as $item) : ?>
    
                                                    <div class="mb-1"><strong class="mr-1"><?= $item->user->nome ?> <?= $item->user->apelido ?> <?= $item->descricao ?></strong>
                                                        <p class="text-muted"><?= $item->created_at ?></p>
                                                    </div>
                                                <?php endforeach ?> --}}
    
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end of main-content -->
                            </div><!-- Footer Start -->
                        </div>
    
                    </div> <!-- end of main-content -->
                </div>
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Sair</button>
                {{-- <button class="btn btn-success ml-2" id="registrar_provincia" type="button">Registar</button> --}}
            </div>
        </div>
    </div>
  </div>