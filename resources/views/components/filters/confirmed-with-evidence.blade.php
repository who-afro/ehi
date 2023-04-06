<div>
    <dt class="text-lg font-semibold text-iaho-dark-blue py-2 px-4 bg-iaho-map-country-background opacity-75">
       Published Evidence
    </dt>
    <dd class="text-gray-700 text-base px-4">
            <div class="flex items-start">
                <div class="flex items-left flex-col">
                    <label>
                        <!-- Zero-width space character, used to align checkbox properly -->
                        &#8203;
                        <input id="confirmed_with_evidence_all" type="radio" name="confirmed_with_evidence"
                               class="form-radio indigo-600 border-2 rounded-md shadow-sm"
                               wire:model="filters.confirmed_with_evidence" value="" checked="checked"/>&nbsp;&nbsp;All
                    </label>
                    <label>
                    <!-- Zero-width space character, used to align checkbox properly -->
                    &#8203;
                    <input id="confirmed_with_evidence_yes" type="radio" name="confirmed_with_evidence"
                           class="form-radio indigo-600 border-2 rounded-md shadow-sm"
                           wire:model="filters.confirmed_with_evidence" value="1"/>&nbsp;&nbsp;Yes
                    </label>
                    <label>
                </div>
            </div>
    </dd>
</div>
