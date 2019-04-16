<div style="margin: 0px 50px 0px 50px" >
    @if(isset($portfolio))
        <table class="table table-hover table-striped" >
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Название</th>
                <th>Изображение</th>
                <th>Фильтр</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($portfolio as $key=>$port_item)
                <tr>
                    <td>{{ $port_item->id }}</td>
                    <td>{!! Html::link(route('portfolioEdit', ['portfolio'=>$port_item->id]), $port_item->name, ['alt'=>$port_item->name]) !!}</td>
                    <td>{{ $port_item->images }}</td>
                    <td>{{ $port_item->filter }}</td>
                    <td>{{ $port_item->created_at }}</td>
                    <td>
                    {!! Form::open(['url'=>route('portfolioEdit', ['portfolio'=>$port_item->id]), 'class'=> 'form-horizontal', 'method'=>'POST']) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Delete', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
                    <td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    {!! Html::link(route('portfolioAdd'), 'New Portfolio') !!}
</div>
