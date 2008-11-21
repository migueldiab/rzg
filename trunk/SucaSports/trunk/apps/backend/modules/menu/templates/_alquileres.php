<div dojoType="dijit.layout.AccordionPane" title="Alquileres">
  <div style="padding:8px">
    <h2>Tooltips</h2>
    <ul>
      <li>
      <span id="ttRich"><b>rich</b> <i>text</i> tooltip</span>

      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Embedded <b>bold</b> <i>RICH</i> text <span style="color:#309; font-size:x-large;">weirdness!</span>
      </span>
      </li>

      <li><a id="ttOne" href="#bogus">anchor tooltip</a>

      <span dojoType="dijit.Tooltip" connectId="ttOne" style="display:none;">tooltip on anchor</span>
      </li>
    </ul>
  </div>
</div>