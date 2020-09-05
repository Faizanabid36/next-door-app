<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label class="mb-5 mt-3"><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label>
        <textarea readonly='readonly' name="message" class="m-send app-scroll text-dark mb-5 mt-3" placeholder="Enter Your Message Here.."></textarea>
        <button class="mb-5 mt-3" disabled='disabled'><span class="fas fa-paper-plane"></span></button>
    </form>
</div>
