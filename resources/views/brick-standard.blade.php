@foreach($items as $item)
<tr>
<td>{{$item->subject}}</td>
<td>{{$item->message}}</td>  
<td>{{$item->name}}</td>
<td>{{$item->email}}</td>
<td>{{$item->created_at}}</td>
<td>@if($item->file)<a href="{{asset($item->file)}}" download>Download</a>@endif</td>
<td>
@if(! $item->answered)
    <form method="POST" action="{{ route('answered-item') }}">
        @csrf
        <input type="hidden" name="id" value="{{$item->id}}">

        <button type="submit" class="btn btn-primary">
            {{ __('Check as Answered') }}
        </button>        
    </form> 
@else
   {{ __('Answered') }}       
@endif
</td>
</tr>
@endforeach