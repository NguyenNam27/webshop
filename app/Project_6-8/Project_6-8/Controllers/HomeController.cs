using Project_6_8.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Project_6_8.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {

            return View();
        }
        public ActionResult About()
        {

            return View();
        }

        public ActionResult Contact()
        {

            return View();
        }
        [Route("Home/ProjectDetail/{id}")]
        public ActionResult ProjectDetail(int? id)
        {
            if (id is null)
            {
                throw new ArgumentNullException(nameof(id));
            }
            else
            {
                var select = GetProjectbyID(id);
                return View(select);
            }
        }

        public ActionResult Project()
        {
            using (var db = new XAY_DUNG1Entities2())
            {
                var select = db.Projects.ToList();
                return View(select);
            }
        }

        private List<Project> GetProjectbyID(int? id)
        {
            using (var db = new XAY_DUNG1Entities2())
            {
                var select = (from s in db.Projects where s.ID_Project == id select s).ToList();
                return select;
            }
        }
    }
}