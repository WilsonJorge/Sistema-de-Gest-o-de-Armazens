@php
//    session()->start();
  //  $_SESSION['html'] = null;
   // $_SESSION['title'] = null;
   // $content = null;
@endphp

<?php session_start();?>
<?php $_SESSION['html'] = null;?>
<?php $_SESSION['title'] = null; ?>
<?php $content=null; ?>


@if(count($provincias)>0)
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Total:  </strong>{{ count($provincias) }}</h4>
        </div>
    </div>
    @php 
        ob_start(); 
    @endphp

    <table class="display table table-hover" width="100%">
        <thead>
            <tr style="font-weight: bold; color:black">
                <th style="width: 8.33%;">#</th>
                <th class="text-center" style="width: 16.67%;" >Nome</th>
                <th class="text-center" style="width: 16.67%;" >Data Criação</th>
                <th class="text-center" style="width: 16.67%;" >Estado</th>
                <!-- <th class="col-1">#</th>
                <th class="col-2">Nome</th>
                <th class="col-2">Data Criação</th>
                <th class="col-2">Estado</th> -->
    @php 
        $content .= ob_get_contents();  
    @endphp
                <th class="col-2">Acções</th>
   @php 
        ob_start(); 
   @endphp

            </tr>
        </thead>
        <tbody>
            @php 
            $cont = 1; 
            @endphp
            @foreach ($provincias as $item)
                <tr>
                    <th scope="row">{{ $cont++ }}</th>
                    <td class="text-center">{{ $item->nome }}</td>
                    <td class="text-center" >{{ $item->created_at }}</td>
                    <td class="text-center"> @php 
                     if($item->estado == '1') : 
                     @endphp
                     <div class="badge bg-success text-white">Activo</div>
                     @php
                     elseif($item->estado == '2'):                    
                    @endphp
                     <div class="badge bg-danger text-white">Inactivo</div>
                    @php
                    endif
                    @endphp
                    
                    </td>
    @php 
        $content .= ob_get_contents(); 
    @endphp
                    <td> 
                        <a href="{{ route('detalhes', ['id' => $item->id]) }}"  class="btn btn-primary"><i class="fa fa-eye text-white"></i> </a>
                        
                        @if($item->estado == '1') 
                        <button class="btn btn-warning" nome="{{ $item->nome }}" value="{{ $item->id }}" id="btn_edit" data-toggle="modal" data-target="#edit-provincia"><i class="fa fa-pencil text-white"></i> </button>
                        <button title="Remover a provincia" class="btn btn-danger" value="{{ $item->id }}" id="btn_delete"><i class="fa fa-trash"></i> </button>
                        @endif

                        @if($item->estado == '2')                    
                        <button title="Activar a provincia" class="btn btn-success" value="{{ $item->id }}" id="btn_active"><i class="fa fa-check"></i> </button>
                        @endif
                    
                    </td>
    @php 
        ob_start(); 
    @endphp

                </tr>
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
    @php 
        $content .= ob_get_contents(); 
    @endphp
     <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          
            <div class="pagination justify-content-end">
            {{ $provincias->links() }}
            </div>
        </div>
    </div>  
@else
    <div class="alert alert-info" role="alert">
        <strong class="text-capitalize">Alerta!</strong>
        Nenhum registro encontrado.
    </div>
@endif



<?php $_SESSION['title'] = "Lista de Provincias"; ?>
<?php   $_SESSION['html'] = $content; ?>

