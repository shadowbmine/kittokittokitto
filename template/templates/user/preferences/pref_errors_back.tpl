{* Shouldn't be a post...but it's the quick-n-dirty way to prevent someone *}
{* from clicking a malicious link and not noticing their profile says "I am *}
{* a plonker" before saving it. *}
<form action='' method='post'>
    <input type='hidden' name='default[email]' value='{$info.email}' />
    <input type='hidden' name='default[gender]' value='{$info.gender}' />
    <input type='hidden' name='default[age]' value='{$info.age}' />
    <input type='hidden' name='default[editor]' value='{$info.editor}' />
    <input type='hidden' name='default[profile]' value='{$info.profile}' />
    <input type='hidden' name='default[signature]' value='{$info.signature}' />
    <input type='submit' value='Go back' />
</form>
