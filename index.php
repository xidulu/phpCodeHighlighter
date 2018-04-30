<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<?php

$code = "";
$lang = "";
$theme = "";
$highlighted_code = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];
    $lang = $_POST["lang"];
    $theme = $_POST["theme"];
    if ($code == "") {
        $highlighted_code = "";
    } else $highlighted_code = highlight_code($code, $lang, $theme);
}

function highlight_code($source_code, $lang, $theme) {
    $css = 'overflow:auto;width:auto;';
    $proc = proc_open(
        'pygmentize -f html -O style='. $theme . ',noclasses=True,cssclass=\'\',cssstyles='.$css. ',startinline,tabsize=4,prestyles=\'margin: 0\' -l ' . $lang,
        [ [ 'pipe', 'r'], ['pipe', 'w']], $pipes
    );
    
    fwrite($pipes[0], $source_code);
    fclose($pipes[0]);

    $output = stream_get_contents($pipes[1]);
    fclose($pipes[1]);
    proc_close($proc);
    return $output;
}

?>

<h2>Code highlighter</h2>

<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<h3>Source code:</h3>
<textarea name="code" rows="10" cols=50%><?php echo $code;?></textarea>
<textarea readonly  rows="10" cols=30%>
    <?php
    echo htmlspecialchars($highlighted_code);
    ?>
</textarea>
<br><br>

Language: <select name="lang">
<option value="abap" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "abap") echo "selected";?>>ABAP</option>
<option value="abnf" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "abnf") echo "selected";?>>ABNF</option>
<option value="ada" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ada") echo "selected";?>>Ada</option>
<option value="adl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "adl") echo "selected";?>>ADL</option>
<option value="agda" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "agda") echo "selected";?>>Agda</option>
<option value="ahk" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ahk") echo "selected";?>>autohotkey</option>
<option value="alloy" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "alloy") echo "selected";?>>Alloy</option>
<option value="antlr-as" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-as") echo "selected";?>>ANTLR With ActionScript Target</option>
<option value="antlr-cpp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-cpp") echo "selected";?>>ANTLR With CPP Target</option>
<option value="antlr-csharp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-csharp") echo "selected";?>>ANTLR With C# Target</option>
<option value="antlr-java" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-java") echo "selected";?>>ANTLR With Java Target</option>
<option value="antlr-objc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-objc") echo "selected";?>>ANTLR With ObjectiveC Target</option>
<option value="antlr-perl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-perl") echo "selected";?>>ANTLR With Perl Target</option>
<option value="antlr" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr") echo "selected";?>>ANTLR</option>
<option value="antlr-python" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-python") echo "selected";?>>ANTLR With Python Target</option>
<option value="antlr-ruby" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "antlr-ruby") echo "selected";?>>ANTLR With Ruby Target</option>
<option value="apacheconf" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "apacheconf") echo "selected";?>>ApacheConf</option>
<option value="apl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "apl") echo "selected";?>>APL</option>
<option value="applescript" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "applescript") echo "selected";?>>AppleScript</option>
<option value="arduino" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "arduino") echo "selected";?>>Arduino</option>
<option value="as3" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "as3") echo "selected";?>>ActionScript 3</option>
<option value="aspectj" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "aspectj") echo "selected";?>>AspectJ</option>
<option value="as" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "as") echo "selected";?>>ActionScript</option>
<option value="aspx-cs" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "aspx-cs") echo "selected";?>>aspx-cs</option>
<option value="aspx-vb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "aspx-vb") echo "selected";?>>aspx-vb</option>
<option value="asy" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "asy") echo "selected";?>>Asymptote</option>
<option value="at" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "at") echo "selected";?>>AmbientTalk</option>
<option value="autoit" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "autoit") echo "selected";?>>AutoIt</option>
<option value="awk" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "awk") echo "selected";?>>Awk</option>
<option value="basemake" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "basemake") echo "selected";?>>Base Makefile</option>
<option value="bash" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "bash") echo "selected";?>>Bash</option>
<option value="bat" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "bat") echo "selected";?>>Batchfile</option>
<option value="bbcode" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "bbcode") echo "selected";?>>BBCode</option>
<option value="bc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "bc") echo "selected";?>>BC</option>
<option value="befunge" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "befunge") echo "selected";?>>Befunge</option>
<option value="blitzbasic" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "blitzbasic") echo "selected";?>>BlitzBasic</option>
<option value="blitzmax" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "blitzmax") echo "selected";?>>BlitzMax</option>
<option value="bnf" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "bnf") echo "selected";?>>BNF</option>
<option value="boogie" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "boogie") echo "selected";?>>Boogie</option>
<option value="boo" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "boo") echo "selected";?>>Boo</option>
<option value="brainfuck" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "brainfuck") echo "selected";?>>Brainfuck</option>
<option value="bro" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "bro") echo "selected";?>>Bro</option>
<option value="bugs" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "bugs") echo "selected";?>>BUGS</option>
<option value="ca65" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ca65") echo "selected";?>>ca65 assembler</option>
<option value="cadl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cadl") echo "selected";?>>cADL</option>
<option value="camkes" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "camkes") echo "selected";?>>CAmkES</option>
<option value="cbmbas" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cbmbas") echo "selected";?>>CBM BASIC V2</option>
<option value="ceylon" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ceylon") echo "selected";?>>Ceylon</option>
<option value="cfc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cfc") echo "selected";?>>Coldfusion CFC</option>
<option value="cfengine3" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cfengine3") echo "selected";?>>CFEngine3</option>
<option value="cfm" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cfm") echo "selected";?>>Coldfusion HTML</option>
<option value="cfs" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cfs") echo "selected";?>>cfstatement</option>
<option value="chai" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "chai") echo "selected";?>>ChaiScript</option>
<option value="chapel" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "chapel") echo "selected";?>>Chapel</option>
<option value="cheetah" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cheetah") echo "selected";?>>Cheetah</option>
<option value="cirru" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cirru") echo "selected";?>>Cirru</option>
<option value="clay" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "clay") echo "selected";?>>Clay</option>
<option value="clojure" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "clojure") echo "selected";?>>Clojure</option>
<option value="clojurescript" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "clojurescript") echo "selected";?>>ClojureScript</option>
<option value="cmake" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cmake") echo "selected";?>>CMake</option>
<option value="c-objdump" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "c-objdump") echo "selected";?>>c-objdump</option>
<option value="cobolfree" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cobolfree") echo "selected";?>>COBOLFree</option>
<option value="cobol" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cobol") echo "selected";?>>COBOL</option>
<option value="coffee-script" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "coffee-script") echo "selected";?>>CoffeeScript</option>
<option value="common-lisp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "common-lisp") echo "selected";?>>Common Lisp</option>
<option value="componentpascal" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "componentpascal") echo "selected";?>>Component Pascal</option>
<option value="console" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "console") echo "selected";?>>Bash Session</option>
<option value="control" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "control") echo "selected";?>>Debian Control file</option>
<option value="coq" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "coq") echo "selected";?>>Coq</option>
<option value="c" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "c") echo "selected";?>>C</option>
<option value="cpp-objdump" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cpp-objdump") echo "selected";?>>cpp-objdump</option>
<option value="cpp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cpp") echo "selected";?>>C++</option>
<option value="cpsa" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cpsa") echo "selected";?>>CPSA</option>
<option value="crmsh" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "crmsh") echo "selected";?>>Crmsh</option>
<option value="croc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "croc") echo "selected";?>>Croc</option>
<option value="cryptol" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cryptol") echo "selected";?>>Cryptol</option>
<option value="csharp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "csharp") echo "selected";?>>C#</option>
<option value="csound-document" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "csound-document") echo "selected";?>>Csound Document</option>
<option value="csound" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "csound") echo "selected";?>>Csound Orchestra</option>
<option value="csound-score" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "csound-score") echo "selected";?>>Csound Score</option>
<option value="css+django" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+django") echo "selected";?>>CSS+Django/Jinja</option>
<option value="css+erb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+erb") echo "selected";?>>CSS+Ruby</option>
<option value="css+genshitext" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+genshitext") echo "selected";?>>CSS+Genshi Text</option>
<option value="css+lasso" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+lasso") echo "selected";?>>CSS+Lasso</option>
<option value="css+mako" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+mako") echo "selected";?>>CSS+Mako</option>
<option value="css+mozpreproc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+mozpreproc") echo "selected";?>>CSS+mozpreproc</option>
<option value="css+myghty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+myghty") echo "selected";?>>CSS+Myghty</option>
<option value="css" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css") echo "selected";?>>CSS</option>
<option value="css+php" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+php") echo "selected";?>>CSS+PHP</option>
<option value="css+smarty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "css+smarty") echo "selected";?>>CSS+Smarty</option>
<option value="cucumber" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cucumber") echo "selected";?>>Gherkin</option>
<option value="cuda" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cuda") echo "selected";?>>CUDA</option>
<option value="cypher" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cypher") echo "selected";?>>Cypher</option>
<option value="cython" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "cython") echo "selected";?>>Cython</option>
<option value="dart" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "dart") echo "selected";?>>Dart</option>
<option value="delphi" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "delphi") echo "selected";?>>Delphi</option>
<option value="dg" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "dg") echo "selected";?>>dg</option>
<option value="diff" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "diff") echo "selected";?>>Diff</option>
<option value="django" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "django") echo "selected";?>>Django/Jinja</option>
<option value="d-objdump" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "d-objdump") echo "selected";?>>d-objdump</option>
<option value="docker" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "docker") echo "selected";?>>Docker</option>
<option value="doscon" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "doscon") echo "selected";?>>MSDOS Session</option>
<option value="dpatch" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "dpatch") echo "selected";?>>Darcs Patch</option>
<option value="d" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "d") echo "selected";?>>D</option>
<option value="dtd" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "dtd") echo "selected";?>>DTD</option>
<option value="duel" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "duel") echo "selected";?>>Duel</option>
<option value="dylan-console" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "dylan-console") echo "selected";?>>Dylan session</option>
<option value="dylan-lid" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "dylan-lid") echo "selected";?>>DylanLID</option>
<option value="dylan" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "dylan") echo "selected";?>>Dylan</option>
<option value="earl-grey" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "earl-grey") echo "selected";?>>Earl Grey</option>
<option value="easytrieve" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "easytrieve") echo "selected";?>>Easytrieve</option>
<option value="ebnf" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ebnf") echo "selected";?>>EBNF</option>
<option value="ecl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ecl") echo "selected";?>>ECL</option>
<option value="ec" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ec") echo "selected";?>>eC</option>
<option value="eiffel" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "eiffel") echo "selected";?>>Eiffel</option>
<option value="elixir" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "elixir") echo "selected";?>>Elixir</option>
<option value="elm" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "elm") echo "selected";?>>Elm</option>
<option value="emacs" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "emacs") echo "selected";?>>EmacsLisp</option>
<option value="erb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "erb") echo "selected";?>>ERB</option>
<option value="erlang" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "erlang") echo "selected";?>>Erlang</option>
<option value="erl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "erl") echo "selected";?>>Erlang erl session</option>
<option value="evoque" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "evoque") echo "selected";?>>Evoque</option>
<option value="ezhil" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ezhil") echo "selected";?>>Ezhil</option>
<option value="factor" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "factor") echo "selected";?>>Factor</option>
<option value="fancy" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "fancy") echo "selected";?>>Fancy</option>
<option value="fan" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "fan") echo "selected";?>>Fantom</option>
<option value="felix" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "felix") echo "selected";?>>Felix</option>
<option value="fish" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "fish") echo "selected";?>>Fish</option>
<option value="fortranfixed" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "fortranfixed") echo "selected";?>>FortranFixed</option>
<option value="fortran" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "fortran") echo "selected";?>>Fortran</option>
<option value="foxpro" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "foxpro") echo "selected";?>>FoxPro</option>
<option value="fsharp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "fsharp") echo "selected";?>>FSharp</option>
<option value="gap" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "gap") echo "selected";?>>GAP</option>
<option value="gas" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "gas") echo "selected";?>>GAS</option>
<option value="genshi" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "genshi") echo "selected";?>>Genshi</option>
<option value="genshitext" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "genshitext") echo "selected";?>>Genshi Text</option>
<option value="glsl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "glsl") echo "selected";?>>GLSL</option>
<option value="gnuplot" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "gnuplot") echo "selected";?>>Gnuplot</option>
<option value="golo" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "golo") echo "selected";?>>Golo</option>
<option value="gooddata-cl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "gooddata-cl") echo "selected";?>>GoodData-CL</option>
<option value="go" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "go") echo "selected";?>>Go</option>
<option value="gosu" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "gosu") echo "selected";?>>Gosu</option>
<option value="groff" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "groff") echo "selected";?>>Groff</option>
<option value="groovy" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "groovy") echo "selected";?>>Groovy</option>
<option value="gst" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "gst") echo "selected";?>>Gosu Template</option>
<option value="haml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "haml") echo "selected";?>>Haml</option>
<option value="handlebars" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "handlebars") echo "selected";?>>Handlebars</option>
<option value="haskell" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "haskell") echo "selected";?>>Haskell</option>
<option value="haxeml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "haxeml") echo "selected";?>>Hxml</option>
<option value="hexdump" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "hexdump") echo "selected";?>>Hexdump</option>
<option value="html+cheetah" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+cheetah") echo "selected";?>>HTML+Cheetah</option>
<option value="html+django" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+django") echo "selected";?>>HTML+Django/Jinja</option>
<option value="html+evoque" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+evoque") echo "selected";?>>HTML+Evoque</option>
<option value="html+genshi" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+genshi") echo "selected";?>>HTML+Genshi</option>
<option value="html+handlebars" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+handlebars") echo "selected";?>>HTML+Handlebars</option>
<option value="html+lasso" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+lasso") echo "selected";?>>HTML+Lasso</option>
<option value="html+mako" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+mako") echo "selected";?>>HTML+Mako</option>
<option value="html+myghty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+myghty") echo "selected";?>>HTML+Myghty</option>
<option value="html" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html") echo "selected";?>>HTML</option>
<option value="html+php" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+php") echo "selected";?>>HTML+PHP</option>
<option value="html+smarty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+smarty") echo "selected";?>>HTML+Smarty</option>
<option value="html+twig" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+twig") echo "selected";?>>HTML+Twig</option>
<option value="html+velocity" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "html+velocity") echo "selected";?>>HTML+Velocity</option>
<option value="http" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "http") echo "selected";?>>HTTP</option>
<option value="hx" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "hx") echo "selected";?>>Haxe</option>
<option value="hybris" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "hybris") echo "selected";?>>Hybris</option>
<option value="hylang" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "hylang") echo "selected";?>>Hy</option>
<option value="i6t" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "i6t") echo "selected";?>>Inform 6 template</option>
<option value="idl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "idl") echo "selected";?>>IDL</option>
<option value="idris" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "idris") echo "selected";?>>Idris</option>
<option value="iex" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "iex") echo "selected";?>>Elixir iex session</option>
<option value="igor" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "igor") echo "selected";?>>Igor</option>
<option value="inform6" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "inform6") echo "selected";?>>Inform 6</option>
<option value="inform7" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "inform7") echo "selected";?>>Inform 7</option>
<option value="ini" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ini") echo "selected";?>>INI</option>
<option value="ioke" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ioke") echo "selected";?>>Ioke</option>
<option value="io" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "io") echo "selected";?>>Io</option>
<option value="irc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "irc") echo "selected";?>>IRC logs</option>
<option value="isabelle" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "isabelle") echo "selected";?>>Isabelle</option>
<option value="jade" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "jade") echo "selected";?>>Jade</option>
<option value="jags" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "jags") echo "selected";?>>JAGS</option>
<option value="jasmin" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "jasmin") echo "selected";?>>Jasmin</option>
<option value="java" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "java") echo "selected";?>>Java</option>
<option value="javascript+mozpreproc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "javascript+mozpreproc") echo "selected";?>>Javascript+mozpreproc</option>
<option value="jcl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "jcl") echo "selected";?>>JCL</option>
<option value="jlcon" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "jlcon") echo "selected";?>>Julia console</option>
<option value="j" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "j") echo "selected";?>>J</option>
<option value="js+cheetah" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+cheetah") echo "selected";?>>JavaScript+Cheetah</option>
<option value="js+django" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+django") echo "selected";?>>JavaScript+Django/Jinja</option>
<option value="js+erb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+erb") echo "selected";?>>JavaScript+Ruby</option>
<option value="js+genshitext" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+genshitext") echo "selected";?>>JavaScript+Genshi Text</option>
<option value="js+lasso" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+lasso") echo "selected";?>>JavaScript+Lasso</option>
<option value="js+mako" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+mako") echo "selected";?>>JavaScript+Mako</option>
<option value="js+myghty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+myghty") echo "selected";?>>JavaScript+Myghty</option>
<option value="jsonld" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "jsonld") echo "selected";?>>JSON-LD</option>
<option value="json" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "json") echo "selected";?>>JSON</option>
<option value="js" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js") echo "selected";?>>JavaScript</option>
<option value="js+php" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+php") echo "selected";?>>JavaScript+PHP</option>
<option value="jsp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "jsp") echo "selected";?>>Java Server Page</option>
<option value="js+smarty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "js+smarty") echo "selected";?>>JavaScript+Smarty</option>
<option value="julia" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "julia") echo "selected";?>>Julia</option>
<option value="kal" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "kal") echo "selected";?>>Kal</option>
<option value="kconfig" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "kconfig") echo "selected";?>>Kconfig</option>
<option value="koka" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "koka") echo "selected";?>>Koka</option>
<option value="kotlin" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "kotlin") echo "selected";?>>Kotlin</option>
<option value="lagda" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lagda") echo "selected";?>>Literate Agda</option>
<option value="lasso" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lasso") echo "selected";?>>Lasso</option>
<option value="lcry" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lcry") echo "selected";?>>Literate Cryptol</option>
<option value="lean" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lean") echo "selected";?>>Lean</option>
<option value="less" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "less") echo "selected";?>>LessCss</option>
<option value="lhs" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lhs") echo "selected";?>>Literate Haskell</option>
<option value="lidr" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lidr") echo "selected";?>>Literate Idris</option>
<option value="lighty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lighty") echo "selected";?>>Lighttpd configuration file</option>
<option value="limbo" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "limbo") echo "selected";?>>Limbo</option>
<option value="liquid" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "liquid") echo "selected";?>>liquid</option>
<option value="live-script" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "live-script") echo "selected";?>>LiveScript</option>
<option value="llvm" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "llvm") echo "selected";?>>LLVM</option>
<option value="logos" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "logos") echo "selected";?>>Logos</option>
<option value="logtalk" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "logtalk") echo "selected";?>>Logtalk</option>
<option value="lsl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lsl") echo "selected";?>>LSL</option>
<option value="lua" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "lua") echo "selected";?>>Lua</option>
<option value="make" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "make") echo "selected";?>>Makefile</option>
<option value="mako" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mako") echo "selected";?>>Mako</option>
<option value="maql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "maql") echo "selected";?>>MAQL</option>
<option value="mask" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mask") echo "selected";?>>Mask</option>
<option value="mason" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mason") echo "selected";?>>Mason</option>
<option value="mathematica" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mathematica") echo "selected";?>>Mathematica</option>
<option value="matlab" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "matlab") echo "selected";?>>Matlab</option>
<option value="matlabsession" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "matlabsession") echo "selected";?>>Matlab session</option>
<option value="minid" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "minid") echo "selected";?>>MiniD</option>
<option value="modelica" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "modelica") echo "selected";?>>Modelica</option>
<option value="modula2" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "modula2") echo "selected";?>>Modula-2</option>
<option value="monkey" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "monkey") echo "selected";?>>Monkey</option>
<option value="moocode" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "moocode") echo "selected";?>>MOOCode</option>
<option value="moon" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "moon") echo "selected";?>>MoonScript</option>
<option value="mozhashpreproc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mozhashpreproc") echo "selected";?>>mozhashpreproc</option>
<option value="mozpercentpreproc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mozpercentpreproc") echo "selected";?>>mozpercentpreproc</option>
<option value="mql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mql") echo "selected";?>>MQL</option>
<option value="mscgen" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mscgen") echo "selected";?>>Mscgen</option>
<option value="mupad" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mupad") echo "selected";?>>MuPAD</option>
<option value="mxml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mxml") echo "selected";?>>MXML</option>
<option value="myghty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "myghty") echo "selected";?>>Myghty</option>
<option value="mysql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "mysql") echo "selected";?>>MySQL</option>
<option value="nasm" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nasm") echo "selected";?>>NASM</option>
<option value="nemerle" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nemerle") echo "selected";?>>Nemerle</option>
<option value="nesc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nesc") echo "selected";?>>nesC</option>
<option value="newlisp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "newlisp") echo "selected";?>>NewLisp</option>
<option value="newspeak" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "newspeak") echo "selected";?>>Newspeak</option>
<option value="nginx" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nginx") echo "selected";?>>Nginx configuration file</option>
<option value="nimrod" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nimrod") echo "selected";?>>Nimrod</option>
<option value="nit" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nit") echo "selected";?>>Nit</option>
<option value="nixos" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nixos") echo "selected";?>>Nix</option>
<option value="nsis" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "nsis") echo "selected";?>>NSIS</option>
<option value="numpy" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "numpy") echo "selected";?>>NumPy</option>
<option value="objdump-nasm" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "objdump-nasm") echo "selected";?>>objdump-nasm</option>
<option value="objdump" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "objdump") echo "selected";?>>objdump</option>
<option value="objective-c" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "objective-c") echo "selected";?>>Objective-C</option>
<option value="objective-c++" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "objective-c++") echo "selected";?>>Objective-C++</option>
<option value="objective-j" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "objective-j") echo "selected";?>>Objective-J</option>
<option value="ocaml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ocaml") echo "selected";?>>OCaml</option>
<option value="octave" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "octave") echo "selected";?>>Octave</option>
<option value="odin" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "odin") echo "selected";?>>ODIN</option>
<option value="ooc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ooc") echo "selected";?>>Ooc</option>
<option value="opa" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "opa") echo "selected";?>>Opa</option>
<option value="openedge" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "openedge") echo "selected";?>>OpenEdge ABL</option>
<option value="pacmanconf" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pacmanconf") echo "selected";?>>PacmanConf</option>
<option value="pan" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pan") echo "selected";?>>Pan</option>
<option value="parasail" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "parasail") echo "selected";?>>ParaSail</option>
<option value="pawn" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pawn") echo "selected";?>>Pawn</option>
<option value="perl6" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "perl6") echo "selected";?>>Perl6</option>
<option value="perl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "perl") echo "selected";?>>Perl</option>
<option value="php" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "php") echo "selected";?>>PHP</option>
<option value="pig" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pig") echo "selected";?>>Pig</option>
<option value="pike" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pike") echo "selected";?>>Pike</option>
<option value="pkgconfig" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pkgconfig") echo "selected";?>>PkgConfig</option>
<option value="plpgsql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "plpgsql") echo "selected";?>>PL/pgSQL</option>
<option value="postgresql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "postgresql") echo "selected";?>>PostgreSQL SQL dialect</option>
<option value="postscript" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "postscript") echo "selected";?>>PostScript</option>
<option value="pot" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pot") echo "selected";?>>Gettext Catalog</option>
<option value="pov" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pov") echo "selected";?>>POVRay</option>
<option value="powershell" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "powershell") echo "selected";?>>PowerShell</option>
<option value="praat" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "praat") echo "selected";?>>Praat</option>
<option value="prolog" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "prolog") echo "selected";?>>Prolog</option>
<option value="properties" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "properties") echo "selected";?>>Properties</option>
<option value="protobuf" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "protobuf") echo "selected";?>>Protocol Buffer</option>
<option value="ps1con" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ps1con") echo "selected";?>>PowerShell Session</option>
<option value="psql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "psql") echo "selected";?>>PostgreSQL console (psql)</option>
<option value="puppet" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "puppet") echo "selected";?>>Puppet</option>
<option value="py3tb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "py3tb") echo "selected";?>>Python 3.0 Traceback</option>
<option value="pycon" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pycon") echo "selected";?>>Python console session</option>
<option value="pypylog" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pypylog") echo "selected";?>>PyPy Log</option>
<option value="pytb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "pytb") echo "selected";?>>Python Traceback</option>
<option value="python3" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "python3") echo "selected";?>>Python 3</option>
<option value="python" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "python") echo "selected";?>>Python</option>
<option value="qbasic" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "qbasic") echo "selected";?>>QBasic</option>
<option value="qml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "qml") echo "selected";?>>QML</option>
<option value="qvto" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "qvto") echo "selected";?>>QVTO</option>
<option value="racket" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "racket") echo "selected";?>>Racket</option>
<option value="ragel-c" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel-c") echo "selected";?>>Ragel in C Host</option>
<option value="ragel-cpp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel-cpp") echo "selected";?>>Ragel in CPP Host</option>
<option value="ragel-d" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel-d") echo "selected";?>>Ragel in D Host</option>
<option value="ragel-em" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel-em") echo "selected";?>>Embedded Ragel</option>
<option value="ragel-java" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel-java") echo "selected";?>>Ragel in Java Host</option>
<option value="ragel-objc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel-objc") echo "selected";?>>Ragel in Objective C Host</option>
<option value="ragel" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel") echo "selected";?>>Ragel</option>
<option value="ragel-ruby" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ragel-ruby") echo "selected";?>>Ragel in Ruby Host</option>
<option value="raw" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "raw") echo "selected";?>>Raw token data</option>
<option value="rbcon" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rbcon") echo "selected";?>>Ruby irb session</option>
<option value="rb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rb") echo "selected";?>>Ruby</option>
<option value="rconsole" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rconsole") echo "selected";?>>RConsole</option>
<option value="rd" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rd") echo "selected";?>>Rd</option>
<option value="rebol" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rebol") echo "selected";?>>REBOL</option>
<option value="redcode" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "redcode") echo "selected";?>>Redcode</option>
<option value="red" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "red") echo "selected";?>>Red</option>
<option value="registry" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "registry") echo "selected";?>>reg</option>
<option value="resource" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "resource") echo "selected";?>>ResourceBundle</option>
<option value="rexx" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rexx") echo "selected";?>>Rexx</option>
<option value="rhtml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rhtml") echo "selected";?>>RHTML</option>
<option value="roboconf-graph" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "roboconf-graph") echo "selected";?>>Roboconf Graph</option>
<option value="roboconf-instances" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "roboconf-instances") echo "selected";?>>Roboconf Instances</option>
<option value="robotframework" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "robotframework") echo "selected";?>>RobotFramework</option>
<option value="rql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rql") echo "selected";?>>RQL</option>
<option value="rsl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rsl") echo "selected";?>>RSL</option>
<option value="rst" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rst") echo "selected";?>>reStructuredText</option>
<option value="rts" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rts") echo "selected";?>>TrafficScript</option>
<option value="rust" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "rust") echo "selected";?>>Rust</option>
<option value="sass" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sass") echo "selected";?>>Sass</option>
<option value="scala" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "scala") echo "selected";?>>Scala</option>
<option value="scaml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "scaml") echo "selected";?>>Scaml</option>
<option value="scheme" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "scheme") echo "selected";?>>Scheme</option>
<option value="scilab" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "scilab") echo "selected";?>>Scilab</option>
<option value="sc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sc") echo "selected";?>>SuperCollider</option>
<option value="scss" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "scss") echo "selected";?>>SCSS</option>
<option value="shen" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "shen") echo "selected";?>>Shen</option>
<option value="slim" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "slim") echo "selected";?>>Slim</option>
<option value="smali" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "smali") echo "selected";?>>Smali</option>
<option value="smalltalk" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "smalltalk") echo "selected";?>>Smalltalk</option>
<option value="smarty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "smarty") echo "selected";?>>Smarty</option>
<option value="sml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sml") echo "selected";?>>Standard ML</option>
<option value="snobol" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "snobol") echo "selected";?>>Snobol</option>
<option value="sourceslist" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sourceslist") echo "selected";?>>Debian Sourcelist</option>
<option value="sparql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sparql") echo "selected";?>>SPARQL</option>
<option value="spec" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "spec") echo "selected";?>>RPMSpec</option>
<option value="splus" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "splus") echo "selected";?>>S</option>
<option value="sp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sp") echo "selected";?>>SourcePawn</option>
<option value="sqlite3" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sqlite3") echo "selected";?>>sqlite3con</option>
<option value="sql" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "sql") echo "selected";?>>SQL</option>
<option value="squidconf" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "squidconf") echo "selected";?>>SquidConf</option>
<option value="ssp" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ssp") echo "selected";?>>Scalate Server Page</option>
<option value="stan" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "stan") echo "selected";?>>Stan</option>
<option value="swift" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "swift") echo "selected";?>>Swift</option>
<option value="swig" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "swig") echo "selected";?>>SWIG</option>
<option value="systemverilog" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "systemverilog") echo "selected";?>>systemverilog</option>
<option value="tads3" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "tads3") echo "selected";?>>TADS 3</option>
<option value="tap" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "tap") echo "selected";?>>TAP</option>
<option value="tcl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "tcl") echo "selected";?>>Tcl</option>
<option value="tcshcon" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "tcshcon") echo "selected";?>>Tcsh Session</option>
<option value="tcsh" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "tcsh") echo "selected";?>>Tcsh</option>
<option value="tea" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "tea") echo "selected";?>>Tea</option>
<option value="termcap" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "termcap") echo "selected";?>>Termcap</option>
<option value="terminfo" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "terminfo") echo "selected";?>>Terminfo</option>
<option value="terraform" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "terraform") echo "selected";?>>Terraform</option>
<option value="tex" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "tex") echo "selected";?>>TeX</option>
<option value="text" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "text") echo "selected";?>>Text only</option>
<option value="thrift" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "thrift") echo "selected";?>>Thrift</option>
<option value="todotxt" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "todotxt") echo "selected";?>>Todotxt</option>
<option value="trac-wiki" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "trac-wiki") echo "selected";?>>MoinMoin/Trac Wiki markup</option>
<option value="treetop" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "treetop") echo "selected";?>>Treetop</option>
<option value="ts" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "ts") echo "selected";?>>TypeScript</option>
<option value="turtle" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "turtle") echo "selected";?>>Turtle</option>
<option value="twig" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "twig") echo "selected";?>>Twig</option>
<option value="urbiscript" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "urbiscript") echo "selected";?>>UrbiScript</option>
<option value="vala" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "vala") echo "selected";?>>Vala</option>
<option value="vb.net" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "vb.net") echo "selected";?>>VB.net</option>
<option value="vctreestatus" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "vctreestatus") echo "selected";?>>VCTreeStatus</option>
<option value="velocity" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "velocity") echo "selected";?>>Velocity</option>
<option value="verilog" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "verilog") echo "selected";?>>verilog</option>
<option value="vgl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "vgl") echo "selected";?>>VGL</option>
<option value="vhdl" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "vhdl") echo "selected";?>>vhdl</option>
<option value="vim" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "vim") echo "selected";?>>VimL</option>
<option value="x10" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "x10") echo "selected";?>>X10</option>
<option value="xml+cheetah" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+cheetah") echo "selected";?>>XML+Cheetah</option>
<option value="xml+django" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+django") echo "selected";?>>XML+Django/Jinja</option>
<option value="xml+erb" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+erb") echo "selected";?>>XML+Ruby</option>
<option value="xml+evoque" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+evoque") echo "selected";?>>XML+Evoque</option>
<option value="xml+lasso" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+lasso") echo "selected";?>>XML+Lasso</option>
<option value="xml+mako" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+mako") echo "selected";?>>XML+Mako</option>
<option value="xml+myghty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+myghty") echo "selected";?>>XML+Myghty</option>
<option value="xml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml") echo "selected";?>>XML</option>
<option value="xml+php" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+php") echo "selected";?>>XML+PHP</option>
<option value="xml+smarty" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+smarty") echo "selected";?>>XML+Smarty</option>
<option value="xml+velocity" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xml+velocity") echo "selected";?>>XML+Velocity</option>
<option value="xquery" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xquery") echo "selected";?>>XQuery</option>
<option value="xslt" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xslt") echo "selected";?>>XSLT</option>
<option value="xtend" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xtend") echo "selected";?>>Xtend</option>
<option value="xul+mozpreproc" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "xul+mozpreproc") echo "selected";?>>XUL+mozpreproc</option>
<option value="yaml+jinja" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "yaml+jinja") echo "selected";?>>YAML+Jinja</option>
<option value="yaml" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "yaml") echo "selected";?>>YAML</option>
<option value="zephir" <?php if(isset($_POST["lang"]) && $_POST["lang"] == "zephir") echo "selected";?>>Zephir</option>

</select>

Theme: <select name="theme">
<option value="algol_nu" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "algol_nu") echo "selected";?>>algol_nu</option>
<option value="algol" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "algol") echo "selected";?>>algol</option>
<option value="autumn" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "autumn") echo "selected";?>>autumn</option>
<option value="borland" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "borland") echo "selected";?>>borland</option>
<option value="bw" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "bw") echo "selected";?>>bw</option>
<option value="colorful" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "colorful") echo "selected";?>>colorful</option>
<option value="default" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "default") echo "selected";?>>default</option>
<option value="emacs" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "emacs") echo "selected";?>>emacs</option>
<option value="friendly" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "friendly") echo "selected";?>>friendly</option>
<option value="fruity" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "fruity") echo "selected";?>>fruity</option>
<option value="igor" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "igor") echo "selected";?>>igor</option>
<option value="lovelace" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "lovelace") echo "selected";?>>lovelace</option>
<option value="manni" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "manni") echo "selected";?>>manni</option>
<option value="monokai" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "monokai") echo "selected";?>>monokai</option>
<option value="murphy" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "murphy") echo "selected";?>>murphy</option>
<option value="native" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "native") echo "selected";?>>native</option>
<option value="paraiso-dark" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "paraiso-dark") echo "selected";?>>paraiso-dark</option>
<option value="paraiso-light" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "paraiso-light") echo "selected";?>>paraiso-light</option>
<option value="pastie" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "pastie") echo "selected";?>>pastie</option>
<option value="perldoc" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "perldoc") echo "selected";?>>perldoc</option>
<option value="rrt" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "rrt") echo "selected";?>>rrt</option>
<option value="tango" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "tango") echo "selected";?>>tango</option>
<option value="trac" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "trac") echo "selected";?>>trac</option>
<option value="vim" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "vim") echo "selected";?>>vim</option>
<option value="vs" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "vs") echo "selected";?>>vs</option>
<option value="xcode" <?php if(isset($_POST["theme"]) && $_POST["theme"] == "xcode") echo "selected";?>>xcode</option>
</select>

<br></br>
<input type="submit" name="submit" value="Submit">

</form>




<div id="preview">

    <strong>Preview:</strong>
    <?php
    echo $highlighted_code;
    ?>
  
</div>



</body>
</html>