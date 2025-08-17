@if(session('success'))
    <div class="successmessage">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="errormessage">
        <ul style="list-style:none; margin:0; padding:0;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('./kassa/cashDesk')
@include('./kassa/menu')
@include('./kassa/sales')
@include('./kassa/offers')

<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>
</div>