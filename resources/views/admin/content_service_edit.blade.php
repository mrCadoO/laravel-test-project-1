<div class="wrapper container-fluid">


    {!! Form::open(['url'=>route('serviceEdit', array('services'=>$data['id'])), 'class'=> 'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}


    <div class="form-group">
        {!! Form::hidden('id',$data['id']) !!}
        {!! Form::label('name','Название: ', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $data['name'], ['class'=>'form-control', 'placeholder'=>'Введите название страницы']) !!}
        </div>
    </div>


    <div class="form-group" >
        {!! Form::label('text','Текст: ', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $data['text'], ['id' => 'editor','class'=>'form-control', 'placeholder'=>'Введите псевдоним']) !!}
        </div>
    </div>


    <div class="form-group  " >
        {!! Form::label('old_icon','Изображение: ', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/img/'.$data['icon'], '', ['class'=>'img-responsive', 'width'=>'150px']) !!}
            {!! Form::hidden('old_icon', $data['icon']) !!}
        </div>
    </div>


    <div class="form-group " >
        {!! Form::label('icon','Изображение:  ', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('icon', ['class'=>'filestyle','data-buttonText'=>'Выбирите изображение', 'data-buttonName'=>'btn-primary', 'data-placeholder'=>'Файла нет']) !!}
        </div>
    </div>


    <div class="form-group" >
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сoхранить', ['class' => 'btn btn-primary', 'type'=>'submit']) !!}
        </div>
    </div>




    {!! Form::close() !!}


</div>
