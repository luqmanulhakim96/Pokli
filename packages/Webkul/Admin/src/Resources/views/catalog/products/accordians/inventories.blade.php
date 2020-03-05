{!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.before', ['product' => $product]) !!}

<accordian :title="'{{ __('admin::app.catalog.products.inventories') }}'" :active="false">
    <div slot="body">

        {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.controls.before', ['product' => $product]) !!}

        @foreach ($inventorySources as $inventorySource)
            <?php

                $qty = 0;
                foreach ($product->inventories as $inventory) {
                    if ($inventory->inventory_source_id == $inventorySource->id) {
                        $qty = $inventory->qty;
                        break;
                    }
                }

                $qty = old('inventories[' . $inventorySource->id . ']') ?: $qty;

            ?>
            <div class="control-group">
                <label>Current Stocks</label>
                <input id="inventory1" type="number" name="inventories1[{{ $inventorySource->id }}]" class="control" value="{{ $qty }}" data-vv-as="&quot;{{ $inventorySource->name }}&quot;" readonly/>
            </div>

            <div class="control-group" :class="[errors.has('inventories2[{{ $inventorySource->id }}]') ? 'has-error' : '']">
                <label>Add New Stocks</label>

                <input id="inventory2" type="number" v-validate="'numeric|min:0'" name="inventories2[{{ $inventorySource->id }}]" class="control" value="0" data-vv-as="&quot;New Stock&quot;" onchange="add()"/>

                <span class="control-error" v-if="errors.has('inventories2[{{ $inventorySource->id }}]')">Negative value is not acceptable</span>
            </div>

            <div class="control-group">
                <label>Updated Stocks</label>
                <input id="inventory3" type="number" name="inventories[{{ $inventorySource->id }}]" class="control" value="{{ $qty }}" data-vv-as="&quot;{{ $inventorySource->name }}&quot;" readonly/>
            </div>

        @endforeach

        {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.controls.after', ['product' => $product]) !!}

    </div>

    <script>
      function add() {
        var a,b,c;
        a=Number(document.getElementById("inventory1").value);
        b=Number(document.getElementById("inventory2").value);
        c= a + b;
        document.getElementById("inventory3").value= c;
      }
    </script>

</accordian>

{!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.after', ['product' => $product]) !!}
