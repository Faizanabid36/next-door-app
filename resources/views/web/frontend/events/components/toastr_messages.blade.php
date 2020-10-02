<script>
    toastr.options.closeButton = true
    @if(Session::has('deleted'))
    toastr.primary("{{Session::get('deleted')}}", 'Event Deleted', {timeOut: 5000});
    @endif
{{--    @if(Session::has('created'))--}}
{{--    toastr.primary("{{Session::get('created')}}", 'Event Create', {timeOut: 5000});--}}
{{--    @endif--}}
</script>
