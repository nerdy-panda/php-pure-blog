import Program from "./Program.js";
import {dashboardBootstrap} from "../../../../Helper/Bootstrapper.js";

dashboardBootstrap();
const app = new Program();
app.main();
