
@section('commentaire')
<div id="comments">
	Commentaires 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.css">
	<comments model="Compterendu" :id="{{ $compterendu->id }}" csrf="{{ csrf_token() }}" ip="{{ md5(\Request::ip()) }}"></comments>
</div>
<script src="{{ asset('js/manifest.6d644269af0752afce69.js') }}"></script>
<script src="{{ asset('js/vendor.5a43481e0b9abccdaa99.js') }}"></script>
<script src="{{ asset('js/app.d582fd47da8be7a98e61.js') }}"></script>
@endsection
