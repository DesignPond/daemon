<div class="row">
    <div class="col-md-12">
        @if($schema)
        <?php

            $total = $schema->box->reduce(function ($carry, $item) {
                return ($carry < $item->top ? $carry + $item->top : $carry);
            },20);

        ?>

        <div id="schemas" style="height: {{ $total }}px;">

            @foreach($schema->box as $box)

                <div class="box" id="{{ $box->id }}"
                     style="position: absolute;
                     background-color: rgb(204, 204, 204);
                     border: medium none;
                     width  : {{ $box->width }}px;
                     height : {{ $box->height }}px;
                     z-index: {{ $box->zindex }};
                     top    : {{ $box->top }}px;
                     left   : {{ $box->left }}px;">
                    <div style="color:#000000;" class="inner">{!! $box->text !!}</div>
                </div>

            @endforeach

        </div>
        @endif
    </div>
</div>