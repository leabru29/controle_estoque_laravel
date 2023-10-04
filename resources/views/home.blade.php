@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $quantidadeTotalProdutos }}</h3>
                            <p>Quantidade de Produtos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>R$ {{ $valorTotalEstoque }}</h3>
                      <p>valor em estoque</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>44</h3>
                    <p>Produtos próximos ao vencimento</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ $qtdProdutosVencido }}</h3>
                    <p>Produtos Vencidos</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('content')
<section>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            Produtos em estoque
        </div>
        <div class="card-body">
            <div>
                <canvas height="90" id="produtos_estoque"></canvas>
            </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-header">
            Produtos próximos do vencimento
        </div>
        <div class="card-body">
            <div>
                <canvas id="produtos_vencimento"></canvas>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
            Valor dos produtos em estoque
        </div>
        <div class="card-body">
            <div>
                <canvas id="vl_produtos_estoque"></canvas>
            </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-header">
            Valor dos Produtos próximos do vencimento
        </div>
        <div class="card-body">
            <div>
                <canvas id="vl_produtos_vencimento"></canvas>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  const ctx = document.getElementById('produtos_estoque');
  const prodVenc = document.getElementById('produtos_vencimento');
  const vlProdEstoque = document.getElementById('vl_produtos_estoque');
  const vlProdVenc = document.getElementById('vl_produtos_vencimento');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['{!! $nomeProduto !!}'],
      datasets: [{
        label: 'Quantidades por Produto',
        data: [{{$quantidadeProduto}}],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(prodVenc, {
    type: 'bar',
    data: {
      labels: ['Vonau', 'Pantogar Resist', 'Pantogar', 'Ellura', 'Xefo', 'Drenison', 'Onicut', 'Doss 7000', 'Hidra', 'Oral Z', 'Endofer', 'Flavenos'],
      datasets: [{
        label: 'Quantidades por Produto',
        data: [3, 19, 1, 5, 2, 3, 10, 9, 11, 23, 11, 20],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(vlProdEstoque, {
    type: 'doughnut',
    data: {
      labels: ['Vonau', 'Pantogar Resist', 'Pantogar', 'Ellura', 'Xefo', 'Drenison', 'Onicut', 'Doss 7000', 'Hidra', 'Oral Z', 'Endofer', 'Flavenos'],
      datasets: [{
        label: 'Quantidades por Produto',
        data: [3, 19, 1, 5, 2, 3, 10, 9, 11, 23, 11, 20],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(vlProdVenc, {
    type: 'doughnut',
    data: {
      labels: ['Vonau', 'Pantogar Resist', 'Pantogar', 'Ellura', 'Xefo', 'Drenison', 'Onicut', 'Doss 7000', 'Hidra', 'Oral Z', 'Endofer', 'Flavenos'],
      datasets: [{
        label: 'Quantidades por Produto',
        data: [3, 19, 1, 5, 2, 3, 10, 9, 11, 23, 11, 20],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@stop