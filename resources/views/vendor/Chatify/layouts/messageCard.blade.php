{{-- -------------------- The default card (white) -------------------- --}}
@if($viewType == 'default')
    @if($from_id != $to_id)
    <div class="message-card" data-id="{{ $id }}">
        <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
            <sub title="{{ $fullTime }}">{{ $time }}</sub>
            {{-- If attachment is a file --}}
            @if(@$attachment[2] == 'file')
                <a href="{{ route(config('chatify.attachments.route'),['fileName'=>$attachment[0]]) }}"
                   style="color: #595959;" class="file-download">
                    <span class="fas fa-file"></span>
                </a>
            @endif
        </p>
    </div>
    {{-- If attachment is an image --}}
    @if(@$attachment[2] == 'image')
        <div>
            <div class="message-card">
                <div class="image-file chat-image"
                     style="width: 250px; height: 150px;background-image: url('{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
                </div>
            </div>
        </div>
    @endif
    @endif
@endif

{{-- -------------------- The notification card -------------------- --}}
@if($viewType == 'notification')
    @if($from_id != $to_id)
        <a href="{{route('user',$from_id)}}">
            <div class="message-card" data-id="{{ $id }}">
                <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
                    <sub title="{{ $fullTime }}">{{ $time }}</sub>
                    {{-- If attachment is a file --}}
                    @if(@$attachment[2] == 'file')
                        <a href="{{ route(config('chatify.attachments.route'),['fileName'=>$attachment[0]]) }}"
                           style="color: #595959;" class="file-download">
                            <span class="fas fa-file"></span> {{$attachment[1]}}</a>
                    @endif
                </p>
            </div>
        </a>
        {{-- If attachment is an image --}}
        @if(@$attachment[2] == 'image')
            <div>
                <div class="message-card">
                    <div class="image-file chat-image"
                         style="width: 250px; height: 150px;background-image: url('{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
                    </div>
                </div>
            </div>
        @endif
    @endif
@endif



{{-- -------------------- Sender card (owner) -------------------- --}}
@if($viewType == 'sender')
    <div class="message-card mc-sender" data-id="{{ $id }}">
        <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
            <sub title="{{ $fullTime }}" class="message-time text-white">
                <span class="fas fa-{{ $seen > 0 ? 'check-double' : 'check' }} seen"></span> {{ $time }}</sub>
            {{-- If attachment is a file --}}
            @if(@$attachment[2] == 'file')
                <a href="{{ route(config('chatify.attachments.route'),['fileName'=>$attachment[0]]) }}"
                   class="file-download">
                    <span class="fas fa-file"></span> File</a>
            @endif
        </p>
    </div>
    {{-- If attachment is an image --}}
    @if(@$attachment[2] == 'image')
        <div>
            <div class="message-card mc-sender">
                <div class="image-file chat-image"
                     style="width: 250px; height: 150px;background-image: url('{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
                </div>
        </div>
    </div>
    @endif
@endif
