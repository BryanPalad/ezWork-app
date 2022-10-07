{{-- static way of making reusable component 
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    {{$slot}}
</div> --}}

{{-- dynamic reusable component that can merge additional class from x-card outside --}}
<div {{$attributes->merge(['class' => "bg-gray-50 border border-gray-200 rounded-lg p-6"])}}>
    {{$slot}}
</div>