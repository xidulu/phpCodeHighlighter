from pygments.styles import get_all_styles
from pygments.lexers import get_all_lexers

styles = list(get_all_styles())

for style in styles:
    #s = "<option value=\"" + style + "\">" + style + "</option>" 
    f = style
    s = style
    print("<option value=\"{}\" <?php if(isset($_POST[\"theme\"]) && $_POST[\"theme\"] == \"{}\") echo \"selected\";?>>{}</option>".format(f,f,s))
    #print(lexer[0]);