{if $error_message}
    <h3>Error</h3>

    <p>{$error_message}</p>
{else}
    <h3>Thank You</h3>

    <p>
        You have verified that your OpenStreetMap username is <strong>"{$osm_username}"</strong>.
        {if $membership_status eq 'Pending'}
            You do unfortunately not fulfil the conditions for the active mapper membership.
            If you contribute with non mapping activities for an equivalent of 42 mapping days, please fill out
            <a href="/active-contributor-membership/application-form-for-active-contributor-membership-other/">this form</a>.
        {elseif $membership_status eq 'New'}
            You fulfil the conditions for the active mapper membership and your membership is active.
            You should get a mail confirming your membership.
        {elseif $membership_status eq 'Current'}
            You fulfil the conditions for the active mapper membership and your membership was renewed.
            You should get a mail confirming your membership renewal.
        {/if}
    </p>
{/if}
