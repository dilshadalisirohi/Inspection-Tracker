<html>
<style>

    body {
        background: #f6f6f6 ;
        margin: 35px !important;
        color: #333;
    }

    .email-body {
        background: white;
        border-radius: 5px;
        max-width: 800px;
        margin: auto;
        padding: 15px 25px;
    }

</style>
<body id="body">
<div style="background: #f6f6f6;
     padding: 35px !important;
     color: #333;">
    <div style="text-align: center; margin-bottom: 35px">
        <img src="{{ url('public/storage/uploads/'.\App\Models\Setting::find(1)->logo) }}" width="100px" alt="">
    </div>
    <div class="email-body" style="background: white;
        border-radius: 5px;
        max-width: 800px;
        margin: auto;
        padding: 15px 25px;">
        {!! $template !!}
    </div>
</div>
</body>
</html>

