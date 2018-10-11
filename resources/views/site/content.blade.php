<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ImgRun</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center margin-top">
                <h1>Генератор постеров для канала</h1>
                <p class="lead">Вводить все данные обязательно</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <p class="text-center btn-danger headText">ШАБЛОН к USD(T)</p>
                <div class="text-center imgCover">
                    {{ Html::image(asset('assets/images/CryptoHaksSignalUSD.jpg'), 'Изображение для сигналов к USD',['class'=>'img-responsive']) }}
                </div>
                {!! Form::open(['action' => 'IndexController@myFormMet', 'method' => 'post']) !!}

                <div class="text-center">{{Form::radio('currency','1',true)}}<br/>{{Form::label('currency','/ USD(T)')}}</div>

            </div>
<div class="col-md-2">
    <div class="text-center marTop">{{Form::label('short','Это SHORT ??',['class'=>'btn-danger headText'])}}<br/>{{Form::checkbox('short','1')}}</div>
</div>
            <div class="col-md-5">
                <p class="text-center btn-danger headText">ШАБЛОН к BTC</p>
                <div class="text-center imgCover">
                    {{ Html::image(asset('assets/images/CryptoHaksSignalBTC.jpg'), 'Изображение для сигналов к BTC',['class'=>'img-responsive']) }}

                </div>

                <div class="text-center">

                    {{Form::radio('currency','2')}}<br/>{{Form::label('currency','/ BTC')}}</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Текстовые данные:</p>
                    <div class="form-group">
                        {!! Form::label('market','MARKETS',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            <div class="col-md-2">{{Form::label('bitfinex','Bitfinex',['class'=>'headText btn-success'])}} {!! Form::checkbox('bitfinex',1, false)!!} </div>
                            <div class="col-md-2">{{Form::label('bittrex','Bittrex',['class'=>'headText btn-success'])}} {{Form::checkbox('bittrex',1,false)}}</div>
                            <div class="col-md-2">{{Form::label('binance','Binance',['class'=>'headText btn-success'])}} {{Form::checkbox('binance',1,false)}}</div>
                            <div class="col-md-2">{{Form::label('poloniex','Poloniex',['class'=>'headText btn-success'])}} {{Form::checkbox('poloniex',1,false)}}</div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('pair','COIN',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('pair', '', ['class'=>'form-control','required'=>'required', 'id'=>'markets', 'placeholder'=>'вторая часть валютной пары / USD(T) или / BTC подставятся автоматом']) !!}
                        </div>

                    </div>

                    <div class="form-group">
                        {!! Form::label('buy','BUY',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::number('buy', '', ['class'=>'form-control','required'=>'required', 'id'=>'buy','step'=>'0.00000001']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('stop','STOP',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::number('stop', '', ['class'=>'form-control','required'=>'required', 'id'=>'stop','step'=>'0.00000001']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('take1','TAKE 1',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::number('take1', '', ['class'=>'form-control','required'=>'required', 'id'=>'take1','step'=>'0.00000001']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('take2','TAKE 2',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::number('take2', '', ['class'=>'form-control', 'id'=>'take2','step'=>'0.00000001']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('risk','RISK',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::select('risk', ['L' => 'Low', 'M' => 'Medium', 'H' => 'High'], 'M') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('depo','DEPO',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::select('depo', ['2' => '2%', '3' => '3%', '5' => '5%', '7' => '7%', '10' => '10%', '15' => '15%', '20' => '20%'], '10') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    {!! Form::button('Нарисовать', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><hr></div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center text-uppercase headText">
                    <p>результат который можно скачать</p>
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                        @if(session()->has('status'))
                            {{ Html::image(asset('assets/images/signal.jpg'), 'Изображение для сигналов к USD',['class'=>'img-responsive']) }}
                        @endif
                    </div>
                    

                </div>
            </div>
        </div>



        {!! Form::close() !!}

    </div><!-- /.container -->
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>