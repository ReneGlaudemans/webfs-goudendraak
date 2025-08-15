@if(session('success'))
    <div
        style="background:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:12px; margin:16px 0; border-radius:6px; text-align:center;">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div
        style="background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:12px; margin:16px 0; border-radius:6px; text-align:center;">
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