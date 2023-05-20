@include('common.header')
<h2>Topic Listing</h2>
<table border="1">
    <tr>
        <th>Topic Title</th>
        <th>Topic Category</th>
    </tr>
    @foreach($topics as $topic)
        <tr>
            <td>
                <a href="{!! url('/topic/detail', [$topic['topic_id']]) !!}">
                    {{ $topic['topic_subject'] }}
                </a>
            </td>
            <td>
                {{ $topic['topic_category_name'] }}
            </td>
        </tr>
    @endforeach
</table>
@include('common.footer')
