using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium;
using System;
using OpenQA.Selenium.Support.UI;
using System.Threading;
using NUnit.Framework.Constraints;

namespace SeleniumTest
{
    public class Tests
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/";
        private IWebDriver webDriver { get; set; }

        private bool IsElementPresent(By by)
        {
            try
            {
                webDriver.FindElement(by);
                return true;
            }
            catch (NoSuchElementException)
            {
                return false;
            }
        }

        [SetUp]
        public void Setup()
        {
            webDriver = new ChromeDriver();
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromSeconds(90);
        }

        [Test]
        public void NavBarTestWithoutLogin()
        {
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();

            Assert.AreEqual(BaseUrl, webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(1)>a")).Click();
            Assert.AreEqual("http://localhost:5174/productsonly", webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/mechanicsonly", webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(3)>a")).Click();
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);

            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(1)>a")).Click();
            Assert.AreEqual("http://localhost:5174/register", webDriver.Url);

            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        }

        [Test]
        public void SellerLoginTest()
        {
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);

            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.Id("password")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();

            Thread.Sleep(15000);
            Assert.AreEqual(BaseUrl, webDriver.Url);

            //webDriver.FindElement(By.Id("dropdown")).Click();
            //Thread.Sleep(2000);
            //webDriver.FindElement(By.CssSelector("#drop>li:nth-child(4)>button")).Click();

            //Thread.Sleep(15000);
            //webDriver.SwitchTo().Alert().Accept();
            
            //Assert.IsFalse(IsElementPresent(By.Id("reglog")));
        }

        [Test]
        public void SellerNavBarTest()
        {
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
            Thread.Sleep(5000);
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);

            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.Id("password")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();

            Thread.Sleep(15000);
            Assert.AreEqual(BaseUrl, webDriver.Url);

            Assert.AreEqual(BaseUrl, webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(1)>a")).Click();
            Assert.AreEqual("http://localhost:5174/productsonly", webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/mechanicsonly", webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(3)>a")).Click();
            Assert.AreEqual("http://localhost:5174/newproduct", webDriver.Url);
        }


        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }
    }
}