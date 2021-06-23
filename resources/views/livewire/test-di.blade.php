<div>
    <div wire:ignore>
        <textarea wire:model="content" id="{{$guid}}" class="description" name="description"></textarea>
    </div>
    <button wire:click="showValue">Show Value</button>
</div>


<script >
    tinymce.init({
        selector: `#{{$guid}}`,
        height: 200,
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('content', editor.getContent())
            });
        },
    })
</script>
